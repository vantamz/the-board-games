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
            <form action="{{ url('reset-password/'.$id) }}">
            <p>
                <h3><b style="color: #ff6c00">Reset password</b></h3>
            </p>
            <br>
            <br>
            <h5>
                Please enter your new password
            </h5>
            <input type="password" name="password">
            <br>
            <br>
            <h5>
                Confirm your new password
            </h5>
            <input type="password" name="confirmpassword">
            <br>
            <div style="text-align: center">
                <button type="submit" class="btn btn-info" style="color: white">Save</button>
            </div>
            <br>
        </form>
        </div>
    </div>
</div>
@endsection
