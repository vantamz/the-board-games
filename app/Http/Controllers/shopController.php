<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\staff;
use App\Models\rating;
use App\Models\comment;
use App\Models\hasRole;
use App\Models\invoice;
use App\Models\product;
use App\Models\voucher;
use App\Models\customer;
use App\Models\promotion;
use App\Models\turtorial;
use App\Models\productType;
use App\Models\userVoucher;
use Illuminate\Support\Str;
use App\Models\notification;
use App\Models\productImage;
use Illuminate\Http\Request;
use App\Models\invoiceDetail;
use App\Models\productDetail;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Session\Session;


class shopController extends Controller
{
    public function __construct()
    {
        $notifications = notification::where('status', '=', 1)->get();
        View::share('notifications', $notifications);
    }

    public function index()
    {
        $products = product::where('status', '=', 1)->latest()->get()->take(16);
        $specialProduct = product::all();
        $productType_1 = product::where('product_type_id', 1)->get();
        $productType_2 = product::where('product_type_id', 2)->get();
        $productType_3 = product::where('product_type_id', 3)->get();
        $productType_4 = product::where('product_type_id', 4)->get();
        $promotion = promotion::all();
        $deals = product::where('status', 1)->get();
        $randomProduct = product::inRandomOrder()->where('status', 1)->first();
        return view('index', compact('products', 'productType_1', 'productType_2', 'productType_3', 'productType_4', 'deals', 'randomProduct'));
    }
    public function loginPage()
    {
        return view('shop.login-page');
    }
    public function registerPage()
    {
        return view('shop.register-page');
    }
    public function category($type)
    {
        if ($type == 1) {
            $products = product::orderBy('price', 'asc')->where('status', 1)->paginate(12);
        } elseif ($type == 2) {
            $products = product::orderBy('price', 'desc')->where('status', 1)->paginate(12);
        } else {
            $products = product::orderBy('created_at')->where('status', 1)->paginate(12);
        }
        $productType_1 = product::where('product_type_id', 1)->where('status', 1)->get();
        $productType_2 = product::where('product_type_id', 2)->where('status', 1)->get();
        $productType_3 = product::where('product_type_id', 3)->where('status', 1)->get();
        $productType_4 = product::where('product_type_id', 4)->where('status', 1)->get();
        $productTypes = productType::where('status', 1)->get();
        return view('shop.category', ['products' => $products], compact('productTypes'));
    }
    public function category_type($id, $type)
    {
        if ($type == 1) {
            $products = product::where('product_type_id', $id)->where('status', 1)->orderBy('price', 'asc')->paginate(12);
        } elseif ($type == 2) {
            $products = product::where('product_type_id', $id)->where('status', 1)->orderBy('price', 'desc')->paginate(12);
        } else {
            $products = product::where('product_type_id', $id)->where('status', 1)->orderBy('created_at')->paginate(12);
        }
        $productTypes = productType::where('status', 1)->get();
        return view('shop.category.category-Type', ['products' => $products], compact('productTypes', 'id'));
    }
    public function category_render($number)
    {
        $products = product::where('price', '<', $number)->orderBy('price')->where('status', 1)->get();
        return view('shop.category.category-render', compact('products'));
    }
    public function categoryPrice_render($price_1, $price_2)
    {
        $products = product::whereBetween('price', [$price_1, $price_2])->where('status', 1)->orderBy('price')->get();
        return view('shop.category.category-render', compact('products'));
    }
    public function single($id)
    {
        $is_buy = false;
        $checkInvoice = 0;
        $check = 0;
        if (Auth::check() && Auth::user()->role == 3) {
            $customer = customer::where('user_id', Auth::user()->id)->first();
            if ($checkInvoice = invoice::where('customer_id', '=', $customer->id)->count() > 0) {
                $invoice = invoice::where('customer_id', '=', $customer->id)->get();
                foreach ($invoice as $abc) {
                    $invoice_detail = invoiceDetail::where('product_id', '=', $id)->where('invoice_id', '=', $abc->id)->count();
                    $check++;
                }
                if ($check > 0)
                    $is_buy = true;
                else
                    $is_buy = false;
            }
        }
        $rate = rating::where('product_id', $id)->get();
        $comments = comment::where('product_id', $id)->get();
        $product_images = productImage::where('product_id', $id)->get();
        /* dd($product_images); */
        $turtorial = turtorial::where('product_id', $id)->first();
        // $productDetail = productDetail::where('product_id', $id)->first();
        $product = product::find($id);
        $relateds = product::where('product_type_id', $product->product_type_id)->where('status', 1)->get();
        $deals = product::where('status', 1)->get();
        return view('shop.single', compact('product', 'product_images', 'comments', 'rate', 'relateds', 'deals', 'turtorial', 'is_buy'));
    }

    public function profile()
    {
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $countKeep = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->count();
        return view('shop.profile-user.profile', compact('customer', 'staff', 'countKeep'));
    }
    public function profile_ajax()
    {
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        return view('shop.profile-user.profile-ajax', compact('customer', 'staff'));
    }
    public function user_update(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $customer->phone = $request->phone;
        $customer->birth = $request->birth;
        $customer->sex = $request->gender;
        if ($request->image != null) {
            $customer->avatar = $this->ImgUpload($request);
        } else {
            $customer->avatar = $customer->avatar;
        }
        $customer->address = $request->address;
        $customer->save();
        return back();
    }
    public function staff_update(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $staff->phone = $request->phone;
        $staff->birth = $request->birth;
        $staff->sex = $request->gender;
        if ($request->image != null) {
            $staff->avatar = $this->ImgUpload($request);
        } else {
            $staff->avatar = $staff->avatar;
        }
        $staff->address = $request->address;
        $staff->save();
        return back();
    }
    public function invoice()
    {
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $invoices = invoice::where('customer_id', $customer->id)->where('keep_product', '=', 0)->get();
        $countKeep = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->count();
        return view('shop.invoice.invoice', compact('customer', 'staff', 'invoices', 'countKeep'));
    }
    public function cancelInvoice(Request $request)
    {
        $invoice = invoice::find($request->invoiceId);
        $customer = customer::find($invoice->customer_id);
        $customer->mark++;
        $customer->save();
        $invoiceDetail = invoiceDetail::where('invoice_id', $invoice->id)->get();
        foreach ($invoiceDetail as $item) {
            $product = product::find($item->product_id);
            $product->stock = $product->stock + $item->number;
            $product->save();
        }
        $invoice->status = 0;
        $invoice->role_cancel = Auth()->user()->role;
        $invoice->reason_cancel = $request->reason;
        $invoice->save();
        return back();
    }
    public function keepProduct()
    {
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $invoices = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->latest()->get();
        $countKeep = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->count();
        return view('shop.invoice.keepproductPage', compact('customer', 'staff', 'invoices', 'countKeep'));
    }
    public function keepProductStore(Request $request)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->addDays(3)->format('Y-m-d');
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $invoice = new invoice();
        foreach ($request->checkId as $item) {
            $oldInvoice = invoice::find($item);
            $invoice->customer_id = $customer->id;
            $invoice->employee_id = 1;
            $invoice->invoice_code = 'HD' . rand(99999, 999999);
            $invoice->vat = $invoice->vat + $oldInvoice->vat;
            //$invoice->ship_fee=$invoice->ship_fee+$oldInvoice->ship_fee;
            $invoice->ship_fee = 0;
            $invoice->price = $invoice->price + $oldInvoice->price;
            $invoice->total_price = $invoice->total_price + $oldInvoice->total_price;
            $invoice->status = 1;
            $invoice->order_status = 1;
            $invoice->payment_method = 1;
            $invoice->keep_product = 0;
            $invoice->expected_date = $now;

            $oldInvoice->status = 0;
            $oldInvoice->save();
        }
        $invoice->save();
        foreach ($request->checkId as $item) {
            $oldInvoiceDetail = invoiceDetail::where('invoice_id', $item)->get();
            foreach ($oldInvoiceDetail as $itemDetail) {
                $newTask = $itemDetail->replicate();
                $newTask->invoice_id = $invoice->id; // the new project_id
                $newTask->save();
            }
        }
        return redirect()->back();
    }
    public function invoiceDetail(invoice $invoice)
    {
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $invoices = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->latest()->get();
        $countKeep = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->count();
        return view('shop.invoice.invoice_detail', compact('invoice', 'staff', 'customer', 'invoices', 'countKeep'));
    }
    public function invoice_ajax()
    {
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $invoices = invoice::where('customer_id', Auth()->user()->id)->get();
        return view('shop.invoice.invoice-ajax', compact('customer', 'staff', 'invoices'));
    }
    public function address()
    {
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        return view('shop.address.address', compact('customer'));
    }
    public function comment_store(Request $request, $id)
    {
        $comments = comment::where('product_id', $id)->get();
        $comment = new comment();
        $rating = new rating();
        $hasRole = hasRole::where('model_id', Auth()->user()->id)->first();
        $comment->comment = $request->comment;
        $comment->product_id = $id;
        $comment->user_id = Auth()->user()->id;
        $comment->role_user = $hasRole->role_id;
        $comment->save();
        $rating->id_comment = $comment->id;
        $rating->rate = $request->rating;
        $rating->product_id = $id;
        $rating->id_user = Auth()->user()->id;
        /* dd($rating); */
        $rating->save();

        return $this->comment_page($id);
    }

    public function comment_page($id)
    {
        $rate = rating::where('product_id', $id)->get();
        $comments = comment::where('product_id', $id)->get();
        return view('shop.comment.comment', compact('comments', 'rate'));
    }
    public function checkout()
    {
        foreach (Session("Cart")->products as $item) {
            $product = product::find($item['productInfo']->id);
            if ($product->stock < $item['productInfo']->stock)
                return back();
        }
        $userRedeemCode = userVoucher::where('user_id', Auth::user()->id)->where('status', 1)->get();
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        return view('shop.checkout', compact('staff', 'customer', 'userRedeemCode'));
    }

    public function invoice_store(Request $request)
    {

        $customer = customer::where('user_id', Auth::user()->id)->first();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->addDays(3)->format('Y-m-d');
        $invoice = new invoice();
        $notification = new notification();
        $notification->content = "Your order has been received";
        $notification->user_id = Auth::user()->id;
        $notification->save();
        $invoice->customer_id = $customer->id;
        $invoice->employee_id = 1;
        $invoice->invoice_code = 'HD' . rand(99999, 999999);
        $invoice->vat = $request->tax;
        $invoice->ship_fee = $request->ship;
        $invoice->price = $request->price;
        if ($request->scancode > 0) {
            $invoice->voucher = $request->scancode;
        }

        $voucher_user = userVoucher::where('voucher_id', $request->voucherId)->where('user_id', $customer->user_id)->first();
        if ($voucher_user !== null) {
            $voucher_user->status = 0;
            $voucher_user->save();
        }

        $customer->point = $customer->point + $request->total / 100;
        $customer->save();
        if ($request->scancode !== null) {
            $invoice->total_price = $request->total - $request->scancode;
        } else {
            $invoice->total_price = $request->total;
        }
        $invoice->status = 1;
        $invoice->order_status = 1;
        $invoice->payment_method = $request->paymentMethod;
        if ($request->keep != null)
            $invoice->keep_product = $request->keep;
        else
            $invoice->keep_product = 0;
        $invoice->expected_date = $now;
        // dd($invoice);
        $invoice->save();
        foreach (Session("Cart")->products as $item) {
            $invoiceDetail = new invoiceDetail;
            $invoiceDetail->invoice_id = $invoice->id;
            $invoiceDetail->product_id = $item['productInfo']->id;
            $invoiceDetail->price = $item['productInfo']->price;
            $invoiceDetail->number = $item['quanty'];
            $invoiceDetail->total_price = $item['productInfo']->price * $item['quanty'];
            $invoiceDetail->save();

            $product = product::find($item['productInfo']->id);
            $product->stock = $product->stock - $item['quanty'];
            $product->save();
        }
        session()->put('invoice_id', $invoice->id);
        session()->forget('Cart');

        if ($invoice->payment_method == 3) {
            $invoice->payment_status = 0;
            $invoice->save();

            $total = $invoice->total_price * 23000; // chuyen sang tien vn
            return redirect("vnpay?total=$total");
        }

        return redirect()->route('confirmation');
    }

    public function ImgUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $request->validate(
                    [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]
                );
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Img/customer-avatar/'), $imageName);
                return $imageName;
            }
            return '';
        }
    }

    public function confirmation()
    {
        $invoice = invoice::find(session('invoice_id'));
        $invoice_detail = $invoice->details;
        /* dd($invoice_detail); */
        foreach ($invoice_detail as $items) {
            $id[] = $items->id;
            $product_id[] = $items->product->name;
            $price[] = $items->price;
            $number[] = $items->number;
            $discount[] = $items->discount;
            $totalPrice[] = $items->total_price;
        }
        $data['id'] = $id;
        $data['product_id'] = $product_id;
        $data['price'] = $price;
        $data['number'] = $number;
        $data['discount'] = $discount;
        $data['total_price'] = $totalPrice;

        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();

        Mail::send('mail.testMail', compact('data'), function ($message) {
            $message->to(Auth::user()->email)->subject('Confirm you order');
        });
        alert()->success('Thank your', 'You order have been received.');
        return view('shop.confirmation', compact('invoice', 'invoice_detail', 'customer', 'staff'));
    }

    public function notificationStatus($id)
    {

        $notification = notification::find($id);
        $notification->status = 0;
        $notification->save();
        return redirect()->back();
    }
    public function notificationAllStatus()
    {
        $notification = notification::where('user_id', Auth::user()->id)->where('status', 1)->get();
        foreach ($notification as $value) {
            $value->status = 0;
            $value->save();
        }
        return redirect()->back();
    }
    public function aboutPage()
    {
        return view('shop.about-us');
    }
    public function cartPage()
    {
        $products = product::inRandomOrder()->where('status', '=', 1)->get();
        $deals = product::where('status', '=', 1)->get();
        $randomProduct = product::inRandomOrder()->where('status', '=', 1)->limit(15)->get();
        return view('shop.cart', compact('products', 'deals', 'randomProduct'));
    }

    public function registerCompletePage()
    {
        return view('shop.registerComplete');
    }

    public function redeemPage()
    {
        $staff = staff::where('user_id', Auth()->user()->id)->first();
        $customer = customer::where('user_id', Auth()->user()->id)->first();
        $vouchers = voucher::where('status', '=', 1)->get();
        $countKeep = invoice::where('customer_id', $customer->id)->where('status', '=', 1)->where('keep_product', '=', 1)->count();
        return view('shop.voucher.voucher', compact('countKeep', 'vouchers', 'staff', 'customer'));
    }

    public function exchangeRedeem($id)
    {

        $voucher = voucher::find($id);
        $vouchers = voucher::where('status', '=', 1)->get();
        $user = User::find(Auth::user()->id);
        $customer = customer::where('user_id', '=', $user->id)->first();
        // $pts = 100;
        if ($customer->point >= $voucher->point) {
            $voucher_user = userVoucher::where('user_id', Auth::user()->id)->where('voucher_id', $id)->first();
            if ($voucher_user->status == 0) {
                $voucher_user->status = 1;
                $voucher_user->save();
                $voucher->quantity = $voucher->quantity - 1;
                $voucher->save();
                $customer->point = $customer->point - $voucher->point;
                $customer->save();
            } else {
                $voucher_user = new userVoucher();
                $voucher_user->voucher_id = $id;
                $voucher_user->user_id = Auth::user()->id;
                $voucher_user->save();
                $voucher->quantity = $voucher->quantity - 1;
                $voucher->save();
                $customer->point = $customer->point - $voucher->point;
                $customer->save();
            }

            return view('shop.voucher.redeem-list', compact('vouchers'));
        } else
            return view('shop.voucher.redeem-list', compact('vouchers'));
    }

    public function vnpay()
    {
        // $vnp_TmnCode = "XMKT96TQ"; //Host
        $vnp_TmnCode = "RZUIZ6V8"; //Mã website tại VNPAY
        // $vnp_HashSecret = "USVCWXTZLLEEPFUCWKDEIJXRZUOUOCRN"; //Chuỗi bí mật //Host
        $vnp_HashSecret = "PUUNKQKSFEBYLSOBPGNPGIGUJVXAPYFY"; //Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/');
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = request('total', 10000) * 100;
        $vnp_Locale = 'vi';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
}
