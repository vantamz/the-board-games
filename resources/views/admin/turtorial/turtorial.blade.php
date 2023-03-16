@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">

    <div class="row d-flex bd-highlight mb-3">
        <div class="col-lg-6">
            <div class="me-auto p-2 bd-highlight">
                <h2>Product</h2>
            </div>
        </div>
    </div>


    <div class="table-responsive table-admin mb-4">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Id product</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($turtorials as $item)
                <tr>
                    <td class="id">{{ $item->id }}</td>
                    <td>{!! $item->productRelation->name !!}</td>
                    <td>{!! $item->title !!}</td>
                    <td>
                        <a href="{{ url('admin/productContent-edit/'.$item->id) }}" class="btn btn-warning"><i class="fal fa-pencil"></i></a>
                    </td>
                    <td>
                        <button class="btn btn-danger contentDelete" data-toggle="modal" data-target="#exampleModal"><i
                            class="fal fa-trash"></i></button>
                        {{-- <a href="{{ url('admin/productContent-destroy/'.$item->id) }}" class="btn btn-danger"><i class="fal fa-trash"></i></a> --}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
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
                        <form action="{{ url('admin/productContent-destroy/') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="text" id="v_id" name="contentId" hidden>
                            <button type="submit" type="button" class="btn btn-primary" >Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.contentDelete', function () {
        var _this = $(this).parents('tr');
        $('#v_id').val(_this.find('.id').text());
    });

</script>
@endsection
