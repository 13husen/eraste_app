<?php $__env->startSection('content_admin'); ?>
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
    ajax: '<?php echo route('get.orders'); ?>',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/admin/home.blade.php ENDPATH**/ ?>