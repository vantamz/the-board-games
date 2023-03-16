@extends('admin.layout')
@section('content')
<div class="container" style="padding-top: 20px">
    <h3>My Profile</h3>
    <div class="row table-admin">
        <div class="col-lg-6">
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Email: </div>
                </div>
                <div class="col-lg-8">
                    <div><input type="text" class="form-control"></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Name: </div>
                </div>
                <div class="col-lg-8">
                    <div> <input type="text" class="form-control"> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Phone</div>
                </div>
                <div class="col-lg-8">
                    <div> <input type="text" class="form-control"> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Birth: </div>
                </div>
                <div class="col-lg-8">
                    <div> <input type="date" class="form-control"> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Sex: </div>
                </div>
                <div class="col-lg-8">
                    <div class="row ">
                        <div class="col-lg-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="maleRadios" checked>
                            <label class="form-check-label" for="maleRadios">
                                Male
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="femaleRadios">
                            <label class="form-check-label" for="femaleRadios">
                                Female
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="otherRadios">
                            <label class="form-check-label" for="otherRadios">
                                Other
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Address: </div>
                </div>
                <div class="col-lg-8">
                    <div> <input type="text" class="form-control"> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 justify-content-end d-flex form-label">
                    <div>Role: </div>
                </div>
                <div class="col-lg-8">
                    <div><input type="text" class="form-control"></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4"></div>
                <div class="col-lg-4"><button class="btn btn-primary">SAVE</button></div>
                <div class="col-lg-4"></div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="d-flex form-label justify-content-center mt-5">
                        <img src="{{ asset('Img/unsigned.png') }}" alt="" class="profile_staff">
                    </div>
                    <div class="d-flex form-label justify-content-center mt-3">
                        <label class="btn btn-light" for="uploadIMG">Upload Image</label>
                    </div>
                    <div class="input-group mb-3">

                        <input type="file" class="form-control" id="uploadIMG" hidden>
                    </div>
                </div>
                <div class="col-lg-4"></div>


            </div>

        </div>
    </div>
</div>
@endsection
