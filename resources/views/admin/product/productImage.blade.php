@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="row">
        {{-- đầu ghi chú của tâm --}}
        {{-- <div class="col-lg-3">
            <div class="table-admin">
                <div>
                    <label for="">Product</label>
                </div>
                <br>
                <form action="{{ route('product-img-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <select name="idProduct" id="" class="form-select">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="inputGroupFile02">IMG</label>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="file-input" name="imageFile[]" multiple="multiple">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="in cen">
                    <div id="img-preview" style="width: 70%;height:70%" class="d-flex"></div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary">SAVE</button>
        </div>
        </form>
    </div>
</div> --}}
{{-- end ghi chú --}}
<div class="col-lg-12 mb-4">
    <div class="table-responsive table-admin">
        <table class="table table-responsive overflow-auto row-border hover todo-table" id="table_id">
            <thead>
                <th>ID</th>
                <th>Product</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($productImages as $productImage)
                <tr>
                    <td class="id">{{ $productImage->id }}</td>
                    <td>{{ $productImage->product_id}}</td>
                    <td>
                        <img src="{{ asset('Img/product-img/'. $productImage->image) }}" alt=""
                            style="width: 250px;height:150px">
                    </td>
                    <td>
                        <a href="{{ url('admin/product-image-edit/'.$productImage->id) }}" class="btn btn-warning"><i
                                class="far fa-pencil"></i></a>
                    </td>
                    <td>
                        <button class="btn btn-danger deleteImg" data-toggle="modal" data-target="#exampleModal"><i
                            class="fal fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><h3 class="modal-title" id="exampleModalLabel">Confirm Lock</h3></div>
                    <div class="col-lg-6 justify-content-end d-flex"><button type="button" class="btn btn-secondary" data-dismiss="modal">X</button></div>
                </div>
            </div>
            <div class="modal-body">
                Confirm delete?
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button></div>
                    <div class="col-lg-6">
                        <form action="{{ url('admin/product-image-delete/') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="text" id="v_id" name="imgId" hidden>
                            <button type="submit" type="button" class="btn btn-primary" >Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.deleteImg', function () {
        var _this = $(this).parents('tr');
        $('#v_id').val(_this.find('.id').text());
    });

</script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable({
            "pageLength": 5
        });
    });

</script>
@endsection
