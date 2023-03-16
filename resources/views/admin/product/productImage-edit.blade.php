@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Add Content</h2>
        </div>
    </div>
    <div class="table-admin">
        <form action="{{ url('admin/product-image-update/'.$productImg->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h5>Product</h5>
                    <input type="text" value="{{ $productImg->product->name }}" class="form-control" readonly>
                </div>
                <div class="col-lg-12">
                    <h5>Content</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" id="formFile" name="image"
                                    onchange="ImgPreview()">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="in cen">
                                <img id="img-preview" src="{{ asset('Img/product-img/'.$productImg->image) }}"
                                    style="width: 80%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    function ImgPreview() {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("img-preview");
        preview.src = src;
    }

</script>
@endsection
