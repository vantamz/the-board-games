@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>About US</b></h1>
            </div>
        </div>
    </div>
</section>
<div class=" container" style="padding-top: 20px;padding-bottom:20px">
    <div>
        <h1 style="text-align: center">About US</h1>
        <hr>
    </div>
    <img src="{{ asset('/Img/ABOUT-US.jpg') }}" alt="" width="100%">
    <br><br>
    <div>
        <p><b>1. About</b></p>
        <p>
        Welcome to The World Of Board Games - a project to popularize Board Games for Vietnamese people and bring a healthy entertainment playground to the Board Game community.
        </p>
        <p>
        When you visit our website, I mean that you agree to the terms. The Website reserves the right to change, modify, add or remove any part of these Terms of Sale, at any time. Changes are effective immediately upon posting on the website without prior notice. accept those changes.
        </p>
        <p>
            Please check back often to stay up to date with our changes.
        </p>
        <p><b>2. Website User Manual</b></p>
        <p>
            When accessing our website, customers must ensure that they are at least 18 years old, or access under the supervision of a parent or legal guardian. Customers have a guarantee of all civil acts to perform goods purchase and sale transactions in accordance with the provisions of Vietnamese law.
        </p>
        <p>
            Use of any part of this website for commercial purposes or on behalf of any third party is strictly prohibited without our prior written permission. If any of these are covered, we will cancel the customer's account without notice.
        </p>
        <p><b>3. Customer opinions</b></p>
        <p>All website content and customer critiques are our property. If we release any fake information, we will immediately lock your account or take different measures as prescribed by Vietnamese law.</p>
        <p><b>4. Accept orders and prices</b></p>
        <p>We reserve the right to limit or cancel your order for anything related to technical errors, customer-managed systems at any time. We may ask for more phone numbers and addresses before accepting orders.</p>
        <p>We are committed to providing the most accurate pricing information to users. However, sometimes errors still occur, for example in case the product is not displayed correctly on the website or the price is wrong, in each case we will link instructions or cancel the order for you. guest. We also reserve the right to restrict or cancel any order whether it is either undetermined or paid.</p>
    </div>
</div>
<div class=" container" style="padding-top: 20px;padding-bottom:20px">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.945997947305!2d106.67820281524087!3d10.738645562825239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f62a90e5dbd%3A0x674d5126513db295!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgU8OgaSBHw7Ju!5e0!3m2!1svi!2s!4v1678639535247!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="container" style="padding-bottom: 35px">
    <div class="row" style="border: 1.1px black solid;border-radius:15px">
        <div class="col-lg-4 contactLeft">
            <div class="container" style="padding-top: 100px;padding-bottom:100px">
                <h1>Contact with us</h1>
            please fill all the information and we will contact you as soon as possible <br> <br>
            <i class="fal fa-phone"></i> 02838505520<br>
            <i class="far fa-envelope"></i> boardgames999@gmail.com<br>
            <i class="fal fa-map-marker-check"></i> 180 Cao Lỗ, Phường 4, Quận 8, Tp.HCM.<br> <br>
            <img src="{{ asset('Img/contact.jpg') }}" alt="" width="100%">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row d-flex justify-content-center container" style="padding-top: 85px;padding-left:100px;padding-right:100px">
                <div class="mb-3 col-lg-12">
                    <label for="inputName" class="form-label">Full Name</label>
                    <input type="email" class="form-control" id="inputName" placeholder="Full name">
                  </div>
                <div class="col-lg-12 mb-3">
                    <label for="inputPhone" class="form-label">Phone*</label>
                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="inputPhone" class="form-label">Email*</label>
                    <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="inputPhone" class="form-label">Address*</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                </div>
                <div class="col-lg-12">
                    <label for="textareaNote">Note*</label>
                    <textarea name="" class="form-control" id="textareaNote" cols="20" rows="5" placeholder="Note"></textarea>
                </div>
                <div class="d-flex justify-content-end" style="padding-top: 20px">
                    <button class="btn primary-btn">SEND CONTACT</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
