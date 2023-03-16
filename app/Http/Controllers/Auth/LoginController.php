<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\customer;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    public function checkLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $admin = Role::findById(1);
        $staff = Role::findById(2);
        $customer = Role::findById(3);
        if (Auth::attempt($data)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                alert()->error('Something wrong', "You still haven't verified your email");

                return redirect()->route('loginPage');
            } elseif (Auth()->user()->hasRole([$admin, $staff])) {
                //true
                toast('Welcome ' . Auth::user()->name, 'success');
                return redirect()->route('admin');
                /* echo 'ok'; */
            } else {
                Auth()->user()->hasRole([$customer]);

                $customerInfo = customer::where('user_id', Auth()->user()->id)->first();
                // dd($customerInfo);
                if ($customerInfo->mark < 3) {
                    toast('Welcome ' . Auth::user()->name, 'success');
                    return redirect()->route('home');
                } else
                    Auth::logout();
                alert()->error('Suspect customer', "Your email has been ban, please contact support department to get more detail");

                return redirect()->route('loginPage');
            }
        } else {
            toast('Wrong email or password', 'error');
            return redirect()->back();
        }
    }

    public function resetPage()
    {
        return view('shop.sendResetPassword');
    }

    public function sendMailReset(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $email = $request->email;
        if ($user !== null) {
            $data['userId'] = $user->id;
            $data['customerName'] = $user->name;
            Mail::send('mail.resetMail', compact('data'), function ($message) use ($email) {
                $message->to($email)->subject('Reset Password');
            });
            toast('Email sent success', 'success');
        }
        return redirect()->back();
    }

    public function resetPassword(Request $request, $id)
    {
        return view('shop.resetPassword', compact('id'));
    }

    public function storePassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        alert()->success('Password reseted', 'You password had been changed.');
        return redirect()->route('loginPage');
    }
}
