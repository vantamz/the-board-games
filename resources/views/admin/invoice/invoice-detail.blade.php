@extends('admin.layout.layout')
@section('adminContent')
<div class="inner-block-other">
    <div class="table-responsive table-admin">
        <table class="table table-responsive overflow-auto row-border hover todo-table" id="table_id">
            <thead>
                <th>Id</th>
                <th>Invoice</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Total price</th>
            </thead>
            <tbody>
                @foreach ($invoices as $item)
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->invoice->invoice_code }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->number }}</td>
                <td>{{ $item->discount }}</td>
                <td>{{ $item->total_price }}</td>
            </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable(
            {"order": [ 0, 'desc' ]}
        );
    });

</script>
@endsection
