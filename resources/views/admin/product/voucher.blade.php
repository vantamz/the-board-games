@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="row">
        <div class="col-lg-3">
            @if(!empty($editData))
            <form action="{{ url('admin/voucher-update/'.$editData->id) }}" method="POST" enctype="multipart/form-data">
                @else
                <form action="{{ url('admin/voucher-store') }}" method="POST">
                    @endif
                    @csrf
                    <div class="table-admin">
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Name</label>
                            <input type="text" id="roleName" name="name" class="form-control"
                                value="{{ !empty($editData)? $editData->name:''}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Price" class="form-label">Price</label>
                            <input type="text" id="Price" name="price" class="form-control"
                                value="{{ !empty($editData)? $editData->price:''}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Quantity" class="form-label">Quantity</label>
                            <input type="text" id="Quantity" name="quantity" class="form-control"
                                value="{{ !empty($editData)? $editData->quantity:''}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Point" class="form-label">Point</label>
                            <input type="text" id="Point" name="point" class="form-control"
                                value="{{ !empty($editData)? $editData->point:''}}" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Representative Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image" onchange="ImgPreview()" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="in cen">
                                    <img id="img-preview-single"  style="width: 50%">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end padding-top-35">
                            @if(!empty($editData))
                            <button type="submit" class="btn btn-primary">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary">Add</button>
                            @endif
                            {{-- <a class="btn btn-primary">Add</a> --}}
                        </div>
                    </div>
                </form>
        </div>
        <div class="col-lg-9">
            <div class="table-responsive table-admin">
                <table class="table table-responsive overflow-auto row-border hover todo-table" id="table_id">
                    <thead>
                        <th>ID</th>
                        <th>Voucher name</th>
                        <th>Voucher image</th>
                        <th>Voucher code</th>
                        <th>Price</th>
                        <th>Point</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $item )
                        <tr>
                            <td class="id">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img id="img-preview" src="{{ asset('Img/voucher-img/'.$item->image) }}" style="width: 80%"></td>
                            <td>{{ $item->voucher_code }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->point }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <p>
                                    <a class="btn btn-success" data-toggle="collapse"
                                        href="#collapseExample{{ $item->id }}" role="button" aria-expanded="false"
                                        aria-controls="collapseExample" style="width: 110px">
                                        <i class="fal fa-cog"></i> Action
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample{{ $item->id }}">
                                    <div class="card card-body">
                                        <br>
                                        <a href="{{url('admin/voucher-edit/'.$item->id)}}"
                                            class="btn btn-warning btn-block">Edit</a>
                                        <br>
                                        <button class="btn btn-danger btn-block deleteVoucher" data-toggle="modal"
                                            data-target="#exampleModal">Deactivate</button>
                                    </div>
                                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Deactivate confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deactivate the voucher?
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{url('admin/voucher-lock/')}}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="text" id="v_id" name="voucherId">
                            <button type="submit" type="button" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.deleteVoucher', function () {
        var _this = $(this).parents('tr');
        $('#v_id').val(_this.find('.id').text());
    });

</script>
<script>
    function ImgPreview() {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("img-preview-single");
        preview.src = src;
    }

</script>
@endsection
