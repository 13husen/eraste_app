@extends('layouts.admin')

@section('content_admin')
                     <table border="2" id="table_order" class="table responsive-table" style="width:100%">
                        <thead>
                            <th>Order Code</th>
                            <th>Product</th>
                            <th>Total Order</th>
                            <th>Status</th>
                            <th>Action</th>

                        </thead>

                    </table>
             

<script>
var table = $('#table_order').DataTable({
    processing: !0,
    serverSide: !0,
    ajax: '{!! route('get.orders') !!}',
    columns: [{
        data: 'order_code',
        name: 'order_code'
    }, {
        data: 'product',
        name: 'product'
    }, {
        data: 'total_order',
        name: 'total_order'
    }, {
        data: 'status',
        name: 'status'
    }, {
        data:'action',
        name:'action'}]
});    
</script>
@endsection
