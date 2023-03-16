@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">

    <div class="row">

        <div class="col-lg-3">
            @if(!empty($editData))
            <form action="{{ url('admin/supplier-update/'.$editData->id) }}" method="POST">
            @else
            <form action="{{ url('admin/supplier-store') }}" method="POST">
            @endif
                @csrf
                <div class="table-admin">
                    <div>
                        <label for="roleName" class="form-label">Supplier's Name</label>
                        <input type="text" id="roleName" name="name" class="form-control" value="{{ !empty($editData)? $editData->name:''}}">
                    </div>
                    <div>
                        <label for="User" class="form-label">Supplier's Address</label>
                        <input type="text" id="User" name="address" class="form-control" value="{{ !empty($editData)? $editData->address:''}}">
                    </div>
                    <div>
                        <label for="User" class="form-label">Supplier's Phone</label>
                        <input type="text" id="User" name="phone" class="form-control" value="{{ !empty($editData)? $editData->phone:''}}">
                    </div>
                    <div>
                        <label for="User" class="form-label">Supplier'Email</label>
                        <input type="text" id="User" name="email" class="form-control" value="{{ !empty($editData)? $editData->email:''}}">
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
                        <th>Supplier's Name</th>
                        <th>Supplier's Adress</th>
                        <th>Supplier's Phone</th>
                        <th>Supplier's Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
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
                                        <a href="{{url('admin/supplier-edit/'.$item->id)}}" class="btn btn-warning btn-block">Edit</a>
                                        <br>
                                        <button  class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModal">Delete</button>
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
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><h3 class="modal-title" id="exampleModalLabel">Confirm Lock</h3></div>
                    <div class="col-lg-6 justify-content-end d-flex"><button type="button" class="btn btn-secondary" data-dismiss="modal">X</button></div>
                </div>
            </div>
      <div class="modal-body">
        Are you sure to delete ?
      </div>
      <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-start">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{url('admin/supplier-delete/'.$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" type="button" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        $('#table_id').DataTable(

        );
    });

</script>
@endsection
