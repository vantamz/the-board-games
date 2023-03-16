@extends('shop.layout')
@section('content')
<section class="banner-category">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-end" style="padding: 90px 120px 100px 0;">
            <div>
                <h1 class="color-w"><b>Register Page</b></h1>
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
<section class="ftco-section" style="padding: 30px 0px 150px 0px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Welcome to Board Game</h2>
                            <p>Already have an account?</p>
                            <a type="button" href="{{ route('loginPage') }}"
                                class="btn btn-white btn-outline-white Ripple-effect radius-50">Sign In</a>
                        </div>
                    </div>

                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('create') }}" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">

                                <label class="label mb-3" for="name">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control log-input" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                <p>
                                    @if($errors->has('email'))
                                    <div class="alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </p>
                            </div>

                            <div class="form-group mb-3">
                                <label class="label mb-3" for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control log-input" placeholder="Password" required
                                    name="password" required>
                                <p>
                                    @if($errors->has('password'))
                                    <div class="alert-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </p>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label mb-3" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control log-input" placeholder="name" required
                                    name="name" required>
                                <p>
                                    @if($errors->has('name'))
                                    <div class="alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </p>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label mb-3" for="phone">{{ __('Phone') }}</label>
                                <input type="text" class="form-control log-input" placeholder="phone" required
                                    name="phone" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label mb-3" for="address">{{ __('Address') }}</label>
                                <input type="input" class="form-control log-input" placeholder="address" required
                                    name="address" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit"
                                    class="form-control btn primary-btn submit px-3 radius-50 Ripple-effect">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
