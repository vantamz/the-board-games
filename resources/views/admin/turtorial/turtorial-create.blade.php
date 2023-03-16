@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Add Content</h2>
        </div>
    </div>

    <div class="table-admin">
        <div class="row">
            <form action="{{ route('turtorial-store') }}" method="POST">
                @csrf
                <div class="col-lg-12">
                    <h5>product</h5>
                    <select name="product_id" id="" class="form-control">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12">
                    <h4>Content</h4>
                    <textarea name="editor" id="editor" cols="30" rows="50"></textarea>
                    {{-- <div id="editor" name="content"></div> --}}
                </div>
                <div class="col-lg-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'indent',
                'outdent',
                '|',
                'imageUpload',
                'insertImage',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo'
            ],
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:side',
                    'toggleImageCaption',
                    'imageStyle:block',
                    '|',
                    'linkImage'
                ]
            },
            insertImage: {
                uploadUrl: "{{route('Img-Upload')}}",
                uploadMethod: 'form',
            },
        }, )
        .catch(error => {
            console.error(error);
        });
</script> --}}

<script type="text/javascript">
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{route('Img-Upload', ['_token' => csrf_token() ])}}",
filebrowserUploadMethod: 'form'
});
</script>
@endsection
