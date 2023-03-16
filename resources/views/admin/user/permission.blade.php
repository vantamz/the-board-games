@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="row">
        <div class="col-lg-3">
            <div class="table-admin">
                <form action="{{ route('permission_store') }}" method="post">
                    @csrf
                    <div>
                        <label for="roleName" class="form-label">Role Name</label>
                        <select name="role" class="form-control" id="roleName">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="User" class="form-label">User</label>
                        <select name="user" class="form-control" id="User">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="d-flex justify-content-end padding-top-35">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="table-responsive table-admin">
                <table class="table">
                    <thead>
                        <th>Role</th>
                        <th>User Email</th>
                    </thead>
                    <tbody>
                        @foreach ($hasRole as $item)
                        <tr>
                            <td>{{ $item->roleRelation->name }}</td>
                            <td>{{ $item->userRelation->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
