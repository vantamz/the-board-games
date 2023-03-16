@extends('admin.layout.layout')
@section('adminContent')

<div class="inner-block-other">
    <div class="table-responsive table-admin">
        <table class="table table-responsive overflow-auto cell-border hover todo-table" id="table_id">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    @can('edit user')
                    <th>Unban</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="id">{!! $user->id !!}</td>
                    <td class="name">{!! $user->name !!}</td>
                    <td class="email">{!! $user->email !!}</td>
                    <td class="status">
                        @if ($user->status==0)
                        Not active
                        @elseif($user->status==1)
                        Active
                        @endif
                    </td>
                    @can('edit user')
                    <td>
                        <button class="btn btn-danger deleteUser" data-toggle="modal" data-target="#userDelete"><i class="fad fa-unlock-alt"></i></button>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="userDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><h3 class="modal-title" id="exampleModalLabel">Confirm unban</h3></div>
                    <div class="col-lg-6 justify-content-end d-flex"><button type="button" class="btn btn-secondary" data-dismiss="modal">X</button></div>
                </div>
            </div>
            <div class="modal-body">
                Unban customer?
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-6 justify-content-start d-flex"><button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button></div>
                    <div class="col-lg-6">
                        <form action="{{ url('admin/unBan-user') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="text" id="v_idUser" name="userId" hidden>
                            <button type="submit" type="button" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.deleteUser', function () {
        var _this = $(this).parents('tr');
        $('#v_idUser').val(_this.find('.id').text());
    });
</script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });

</script>
@endsection
