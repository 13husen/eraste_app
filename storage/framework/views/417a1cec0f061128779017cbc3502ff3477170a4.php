<?php $__env->startSection('content_admin'); ?>
                     <table border="2" id="table_order" class="table responsive-table" style="width:100%">
                        <thead>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>

                    </table>
                    <a href="<?php echo e(route('home.add')); ?>?on=product">tambah data</a>
             

<script>
var table = $('#table_order').DataTable({
    processing: !0,
    serverSide: !0,
    ajax: '<?php echo route('get.products'); ?>',
    columns: [{
        data: 'code',
        name: 'code'
    }, {
        data: 'gambar',
        name: 'gambar'
    }, {
        data: 'name',
        name: 'name'
    }, {
        data: 'price',
        name: 'price'
    }, {
        data:'action',
        name:'action'}]
});    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/admin/product.blade.php ENDPATH**/ ?>