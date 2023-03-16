@extends('admin.layout.layout')
@section('adminContent')

<div class="inner-block-other">
    <div class="row">
        <div class="col-lg-3">
            <form action="{{ route('promotion-store') }}" method="POST">
                @csrf
                <div class="table-admin">
                <div class="mb-3">
                    <label for="roleName" class="form-label">Promotion's Name</label>
                    <input type="text" id="roleName" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="User" class="form-label">Sale off</label>
                    <input type="text" id="User" class="form-control" name="rate" required>
                </div>
                <div class="mb-3">
                    <label for="User" class="form-label">Product</label>
                    <select name="productId" id="productNumber" class="form-control">
                        @foreach ($products as $item)
                        <option value="{{ $item->id }}">{{ $item->product_code }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="User" class="form-label">Start Date</label>
                    <input type="date" name="startDate" id="User" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="User" class="form-label">End' Date</label>
                    <input type="date" name="endDate" id="User" class="form-control">
                </div>
                <div class="d-flex justify-content-end" style="padding: 15px 15px 15px 15px">
                    <button class="btn btn-primary">Add</button>
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
                        <th>Promotion's Name</th>
                        <th>Product's Name</th>
                        <th>Sale Off</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $promotion)
                        <tr>
                            <td>{{ $promotion->id }}</td>
                            <td>{{ $promotion->name }}</td>
                            {{-- <td>{{ $promotion->productRelation->name }}</td> --}}
                            <td>{{ $promotion->rate }}%</td>
                            <td>
                                @if ($promotion->status==0)
                                Not Active
                                @elseif($promotion->status==1)
                                Active
                                @endif
                            </td>
                            <td>{{ $promotion->start_date }}</td>
                            <td>{{ $promotion->end_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable(
            {"pageLength": 10}
        );
    });

    $(document).ready(function() {
    $('#productNumber').select2();
});
</script>
@endsection
