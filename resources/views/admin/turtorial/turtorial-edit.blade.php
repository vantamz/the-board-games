@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Add Content</h2>
        </div>
    </div>

    <div class="table-admin">

        <form action="{{ url('admin/productContent-update/'.$productContent->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <h4>Product name</h4>
                     <br>
                    <input type="text" value="{{ $productContent->productRelation->name }}" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h4>Content</h4>
                    <br>
                    <textarea name="editor" id="editor" cols="30" rows="50">{{ $productContent->content }}</textarea>
                    {{-- <div id="editor" name="content"></div> --}}
                </div>
                <div class="col-lg-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>


<script type="text/javascript">
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{route('Img-Upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

</script>
@endsection
