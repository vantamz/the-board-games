@extends('admin.layout')
@section('content')
<div class="container-fluid" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-3">
            <div class="table-responsive" style="background-color: #fff;border-radius:15px 15px 15px 15px">
                <div style="padding:15px 15px 15px 15px">
                    <div>
                        <b>ADD USER</b>
                        <input type="text" value="{{ $usersedit->id }}" name="id" hidden>
                    </div>
                    <form method="POST" action="{{ route('updateUser',$usersedit->id) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <div class=" mb-3">
                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>


                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $usersedit->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="email"
                                    class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $usersedit->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="justify-content-center d-flex">
                            <button type="submit" class="btn btn-primary">
                                {{ __('SAVE') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-lg-9">
            <div class="table-responsive" style="background-color: #fff;border-radius:15px 15px 15px 15px">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-pencil"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger"><i class="fal fa-trash"></i></button>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>


@include('admin.user.userCreate_modal')
@endsection
