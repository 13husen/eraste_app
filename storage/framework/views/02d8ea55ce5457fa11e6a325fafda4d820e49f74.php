<?php $__env->startSection('content_admin'); ?>
<h2><?php echo e($message); ?></h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/admin/adminres.blade.php ENDPATH**/ ?>