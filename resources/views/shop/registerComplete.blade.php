@extends('shop.layout')
@section('content')
@section('css')
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
@endsection
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Shopping cart</b></h1>
                <nav class="d-flex align-items-center color-w">
                    <a href>
                        Home
                        <span style="  display: inline-block;
                        margin: 0 10px;"><i class="fal fa-long-arrow-right"></i></span>
                    </a>
                    <a href>
                        Register
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div style="padding-top: 150px;padding-bottom:150px">
    <div class="centerDiv fontBig" id="shadow">
        <div style="padding-left: 10px;padding-right:10px">
            <p>
                <h3><b style="color: #ff6c00">Register successful</b></h3>
            </p>
            <div style="text-align: center">
                <span>
                    <i class="fal fa-envelope fa-6x"></i>
                </span>
            </div>
            <br>
            <div style="text-align: center">
                <h3>In order to have the best experiment, please verify your email address</h3>
            </div>
            <br>
            <br>
            <div style="text-align: center">
                <h5>We've sent you a verification email to <b>verify</b> you email address.</h5>
            </div>

            <br><br>
            <div style="text-align: center">
                <h6>Note: Don't forget to check your spam folder. If still don't work please click <a onclick="reSend({{ $user->id }})" style="color: #ff6c00;cursor: pointer;" {{-- href="{{ url('resend-email/'.$user->id) }}" --}}>here</a>.</h6>
            </div>
        </div>
    </div>
</div>
<script>
    function reSend(id){
    $.ajax({
        url: '/resend-email/'+id,
        type: 'GET',
    }).done(function(response){
        //alertify.success('Email sended');
    });
}
</script>
@endsection
