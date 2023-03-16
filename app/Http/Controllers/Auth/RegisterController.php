<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\customer;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        dd('abc');
         $validator=Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        /* $user = new User(); */
        $customer=new customer();
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $customer->status=0;
        $customer->user_id=$user->id;
        $customer->avatar='unsigned.png';
        $userRole=User::findOrFail($user->id);
        $userRole->assignRole('customer');
        $data=[
            'userId'=>$user->id,
            'customerName'=>$customer->name,
            'message'=>'Successful',
        ];
        Mail::send('mail.registerMail', compact('data'), function($message) use ($request)
        {
            $message->to($request->email)->subject('Complete register');
        });
        $customer->save();
        return $this->registerFinishPage($user->id);
        //return redirect()->route('home');
    }
    protected function registerFinishPage($id)
    {
        $user=User::find($id);
        return view('shop.registerComplete',compact('user'));
    }

    protected function verifyEmail($id){
        $user=User::find($id);
        $customer=customer::where('user_id',$id)->first();
        $user->status=1;
        $customer->status=1;
        $user->save();
        $customer->save();
        alert()->success('Success','Your email have been verified.');
        return view('shop.login-page');
    }

    protected function resendMail($id){
        $user=User::find($id);
        $customer=customer::where('user_id',$id)->first();
        $data=[
            'userId'=>$user->id,
            'customerName'=>$customer->name,
            'message'=>'Successful',
        ];
        Mail::send('mail.registerMail', compact('data'), function($message) use ($user)
        {
            $message->to($user->email)->subject('Complete register');
        });
        return redirect()->back();
    }

}
