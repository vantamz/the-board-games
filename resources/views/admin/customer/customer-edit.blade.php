@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <h3>Customer edit</h3>

    <form action="{{ url('admin/customer-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row table-admin">
            <input type="text" name="customer_id" value="{{ $customer->id }}" hidden>
            <div class="col-lg-6">
                <div class="row mb-3">
                    <div class="col-lg-4 justify-content-end d-flex form-label">
                        <div>Email: </div>
                    </div>
                    <div class="col-lg-8">
                        <div><input type="text" name="email" class="form-control" value="{{ $user->email }}"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4 justify-content-end d-flex form-label">
                        <div>Name: </div>
                    </div>
                    <div class="col-lg-8">
                        <div> <input type="text" name="name" class="form-control" value="{{ $user->name }}"> </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4 justify-content-end d-flex form-label">
                        <div>Phone</div>
                    </div>
                    <div class="col-lg-8">
                        <div> <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}"> </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4 justify-content-end d-flex form-label">
                        <div>Birth: </div>
                    </div>
                    <div class="col-lg-8">
                        <div> <input type="date" class="form-control" name="birth" value="{{ $customer->birth }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4 justify-content-end d-flex form-label">
                        <div>Sex: </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row ">
                            <div class="col-lg-4">
                                <input class="form-check-input" type="radio" name="gender" id="maleRadios" value="1"
                                    <?php if ($customer->sex == 1) { echo 'checked';}?>>
                                <label class="form-check-label" for="maleRadios">
                                    Male
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-check-input" type="radio" name="gender" id="femaleRadios" value="2"
                                    <?php if ($customer->sex == 2) { echo 'checked';}?>>
                                <label class="form-check-label" for="femaleRadios">
                                    Female
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-check-input" type="radio" name="gender" id="otherRadios" value="3"
                                    <?php if ($customer->sex == 3) { echo 'checked';}?>>
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
                        <div> <input type="text" class="form-control" name="address" value="{{ $customer->address }}"> </div>
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
                            <img src="@php
                            if (!empty($customer->avatar)) {
                                echo asset('Img/customer-avatar/' . $customer->avatar);
                            }
                            else {
                                echo asset('Img/unsigned.png');
                            }
                        @endphp" alt="" class="profile_staff" id="img-preview-single">
                        </div>
                        <div class="d-flex form-label justify-content-center mt-3">
                            <label class="btn btn-light" for="uploadIMG">Upload Image</label>
                        </div>
                        <div class="input-group mb-3">

                            <input type="file" class="form-control" id="uploadIMG" name="image" hidden onchange="ImgPreview()">
                        </div>
                    </div>
                    <div class="col-lg-4"></div>


                </div>

            </div>
        </div>
    </form>
</div>
<script>
    function ImgPreview() {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("img-preview-single");
        preview.src = src;
    }

</script>
@endsection
