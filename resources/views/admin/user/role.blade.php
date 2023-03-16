@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="row">
        <div class="col-lg-3">
            <div class="table-admin">
                <form action="{{ route('roleStore') }}" method="POST">
                    @csrf
                    <div>
                        <label for="roleName" class="form-label">Role Name</label>
                        <input type="text" name="name" id="roleName" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-end padding-top-35">
                        <button class="btn btn-primary" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="table-responsive table-admin">
                <table class="table">
                    <thead>
                        <th style="width: 50%">ID</th>
                        <th style="width: 50%">Role Name</th>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td style="width: 50%">{{  $role->id  }}</td>
                            <td style="width: 50%">{{ $role->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
