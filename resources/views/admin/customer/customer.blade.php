@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block">
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <h2>Customer</h2>
        </div>
    </div>

    <div class="table-responsive table-admin mb-4">
        <table class="table table-responsive overflow-auto row-border hover todo-table" id="table_id">
            <thead>
                <th >ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Birth</th>
                <th>Gender</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td class="id">{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->birth }}</td>
                    <td>
                        @if ($customer->sex==1)
                        Male
                        @elseif ($customer->sex==2)
                        Female
                        @elseif($customer->sex==3)
                        Other
                        @endif
                    </td>
                    <td><img src="{{ asset('Img/customer-avatar/'.$customer->avatar) }}" alt=""
                            style="width: 150px;height:150px"></td>
                    <td>{{ $customer->status==0? "Not active": "Active" }}</td>
                    <td>
                        <a href="{{ url('admin/customer-edit',$customer->id) }}" class="btn btn-warning editUser"><i
                                class="far fa-pencil"></i></a>

                    </td>
                    <td>
                        <button class="btn btn-danger customerLock" data-toggle="modal" data-target="#exampleModal" href="#exampleModal"><i
                                class="fal fa-trash"></i></button>
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

                {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button> --}}

            </div>
            <div class="modal-body">
                Lock customer?
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button></div>
                    <div class="col-lg-6">
                        <form action="{{ url('admin/customer-lock') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="text" id="v_id" name="customerId" hidden>
                            <button type="submit" type="button" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.customerLock', function () {
        var _this = $(this).parents('tr');
        $('#v_id').val(_this.find('.id').text());
    });

</script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });

</script>
@endsection
