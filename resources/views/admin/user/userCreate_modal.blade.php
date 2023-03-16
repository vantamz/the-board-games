<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><h3 class="modal-title" id="exampleModalLabel">Edit user</h3></div>
                    <div class="col-lg-6 justify-content-end d-flex"><button type="button" class="btn btn-secondary" data-dismiss="modal">X</button></div>
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateUser',$user->id) }}">
                    @method('POST')
                    @csrf
                    <input type="text" value=" " name="id" id="v_id" hidden>
                    <div class=" mb-3">
                        <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                        <input id="v_name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <input id="v_email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div style="padding-top: 30px">
                        <button type="submit" class="btn btn-primary col-lg-12">
                            {{ __('SAVE') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
