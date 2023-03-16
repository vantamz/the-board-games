<div id="profile">
    <h3>My profile</h3>
    <h6>Manage profile information to protect account</h6>
    <hr>
    <p></p>
    <form action="{{ route('profile-user-update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-lg-2 justify-content-end d-flex form-label">
                        <div>Email: </div>
                    </div>
                    <div class="col-lg-10">
                        <div><input type="text" class="form-control" name="email"
                                value="{{ Auth()->user()->email }}"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2 justify-content-end d-flex form-label">
                        <div>Name: </div>
                    </div>
                    <div class="col-lg-10">
                        <div> <input type="text" class="form-control" name="name"
                                value="{{ Auth()->user()->name }}"> </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2 justify-content-end d-flex form-label">
                        <div>Phone</div>
                    </div>
                    <div class="col-lg-10">
                        <div> <input type="text" class="form-control"
                                value="{{ !empty($customer)?$customer->phone : $staff->phone }}"
                                name="phone"> </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2 justify-content-end d-flex form-label">
                        <div>Birth: </div>
                    </div>
                    <div class="col-lg-10">
                        <div> <input type="date" class="form-control"
                                value="{{ !empty($customer)?$customer->birth : $staff->birth }}"
                                name="birth"> </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2 justify-content-end d-flex form-label">
                        <div>Sex: </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row ">
                            <div class="col-lg-4">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="maleRadios" value="1"
                                    <?php if(!empty($customer)) {if($customer->sex==1){echo 'checked';}} elseif (!empty($staff)) { if($staff->sex==1){echo 'checked';}} ?>>
                                <label class="form-check-label" for="maleRadios">
                                    Male
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="femaleRadios" value="2"
                                    <?php if(!empty($customer)) {if($customer->sex==2){echo 'checked';}} elseif (!empty($staff)) { if($staff->sex==2){echo 'checked';}} ?>>
                                <label class="form-check-label" for="femaleRadios">
                                    Female
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="otherRadios" value="3"
                                    <?php if(!empty($customer)) {if($customer->sex==3){echo 'checked';}} elseif (!empty($staff)) { if($staff->sex==3){echo 'checked';}} ?>>
                                <label class="form-check-label" for="otherRadios">
                                    Other
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-2 justify-content-end d-flex form-label">
                        <div>Address: </div>
                    </div>
                    <div class="col-lg-10">
                        <div> <input type="text" class="form-control"
                                value="{{ !empty($customer)?$customer->address : $staff->address }}"
                                name="address"> </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"><button class="btn btn-primary">SAVE</button></div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex form-label justify-content-center">
                            <img src="@php
                                            if(!empty($customer->avatar))
                                            echo asset('Img/customer-avatar/'.$customer->avatar);
                                            else
                                            echo asset('Img/unsigned.png');
                                        @endphp" alt="" class="profile_edit" id="img-preview-single">
                        </div>

                        <div class="d-flex form-label justify-content-center mt-3">
                            <label class="btn btn-light" for="uploadIMG">Upload Image</label>
                        </div>
                        <div class="input-group mb-3">

                            <input type="file" class="form-control" name="image" id="uploadIMG" hidden
                                onchange="ImgPreview()">
                        </div>
                    </div>
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