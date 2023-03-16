@extends('shop.layout')
@section('content')
<style>
    .fontBig{
           font-size: 20px !important;
       }
       .centerDiv {
           margin: auto;
           width: 50%;
           border: 3px solid #ff6c00;
           padding: 10px;
       }
</style>
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Forgot password</b></h1>
                <nav class="d-flex align-items-center color-w">
                    <a href>
                        Home
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div style="padding-top: 150px;padding-bottom:150px">
    <div class="centerDiv fontBig" id="shadow">
        <div style="padding-left: 10px;padding-right:10px">
            <form action="{{ url('reset-password-mail') }}">
            <p>
                <h3><b style="color: #ff6c00">Reset password</b></h3>
            </p>
            <br>
            <h4>
                Please enter you email address
            </h4>
            <input type="text" name="email">
            <br>
            <br>
            <div style="text-align: center">
                <button type="submit" class="btn btn-light">Send Password Reset Link</button>
                {{-- <h6>Note: Don't forget to check your spam folder. If still don't work please click <a onclick="reSend({{ $user->id }})" style="color: #ff6c00;cursor: pointer;" href="{{ url('resend-email/'.$user->id) }}">here</a>.</h6> --}}
            </div>
            <br>
        </form>
        </div>
    </div>
</div>
@endsection
