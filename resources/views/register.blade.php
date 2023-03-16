<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color: transparent!important;border-style:none">
            <section class="ftco-section">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                                    <div class="text w-100">
                                        <div class="d-flex justify-content-end close-button">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <h2>Welcome to Board Game</h2>
                                        <p>Don't have an account?</p>
                                        <button type="buttoz"
                                            class="btn btn-white btn-outline-white Ripple-effect radius-50"
                                            data-bs-toggle="modal" data-bs-target="#ModalLogin"
                                            data-bs-dismiss="modal">Sign Up</button>
                                    </div>
                                </div>

                                <div class="login-wrap p-4 p-lg-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4">Sign In</h3>
                                        </div>
                                        <div class="w-100">
                                            <p class="social-media d-flex justify-content-end">
                                                <a href="#"
                                                    class="social-icon d-flex align-items-center justify-content-center"><span
                                                        class="fab fa-facebook-f"></span></a>
                                                <a href="#"
                                                    class="social-icon d-flex align-items-center justify-content-center"><span
                                                        class="fab fa-twitter"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('UserLogin') }}" class="signin-form">
                                        @csrf
                                        <div class="form-group mb-3">

                                            <label class="label mb-3"
                                                for="name">{{ __('E-Mail Address') }}</label>
                                            <input type="email" class="form-control log-input" @error('email')
                                                is-invalid @enderror" name="email" value="{{ old('email') }}"
                                                required autocomplete="email" autofocus placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label mb-3"
                                                for="password">{{ __('Password') }}</label>
                                            <input type="password" class="form-control log-input"
                                                placeholder="Password" required @error('password') is-invalid
                                                @enderror" name="password" required
                                                autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit"
                                                class="form-control btn primary-btn submit px-3 radius-50 Ripple-effect">{{ __('Sign In') }}</button>

                                        </div>

                                    </form>
                                    <div class="form-group d-md-flex mb-3">
                                        <div class="w-50 text-left remember">
                                            <input type="checkbox" id="rememberCheck" checked>
                                            <span class="checkmark"></span>
                                            <label class="checkbox-wrap checkbox-primary mb-0 label-color"
                                                for="rememberCheck">Remember Me</label>
                                        </div>
                                        <div class="w-50 d-flex justify-content-end text-md-right">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-log">{{ __('Forgot Password?') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color: transparent!important;border-style:none">
            <section class="ftco-section" >
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                                    <div class="text w-100">
                                        <h2>Welcome to TK Board Game</h2>
                                        <p>Already have an account?</p>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#ModalRegister"
                                        data-bs-dismiss="modal" class="btn btn-white btn-outline-white Ripple-effect radius-50">Sign In</a>
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

                                            <label class="label mb-3"
                                                for="name">{{ __('E-Mail Address') }}</label>
                                            <input type="email" class="form-control log-input"
                                            name="email" value="{{ old('email') }}"
                                                required autocomplete="email" placeholder="Email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label mb-3"
                                                for="password">{{ __('Password') }}</label>
                                            <input type="password" class="form-control log-input"
                                                placeholder="Password" required name="password" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label mb-3"
                                                for="name">{{ __('name') }}</label>
                                            <input type="text" class="form-control log-input"
                                                placeholder="name" required name="name" required >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label mb-3"
                                                for="phone">{{ __('phone') }}</label>
                                            <input type="text" class="form-control log-input"
                                                placeholder="phone" required name="phone" required >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label mb-3"
                                                for="phone">{{ __('birth') }}</label>
                                            <input type="date" class="form-control log-input"
                                                placeholder="birth" required name="birth" required >
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
        </div>
        </div>
    </div>
</div>
