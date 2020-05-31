@extends('layouts.admin')

@section('content_admin')
                     <table border="2" id="table_order" class="table responsive-table" style="width:100%">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>

                        </thead>

                    </table>
                    <a href="{{ route('home.add') }}?on=user">tambah data</a>

             

<script>
var table = $('#table_order').DataTable({
    processing: !0,
    serverSide: !0,
    ajax: '{!! route('get.users') !!}',
    columns: [{
        data: 'name',
        name: 'name'
    }, {
        data: 'email',
        name: 'email'
    },{
        data:'action',
        name:'action'}]
});    
</script>
@endsection
