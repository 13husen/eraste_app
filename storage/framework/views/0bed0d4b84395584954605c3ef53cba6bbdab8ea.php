<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?php echo asset('assets/jquery.min.js'); ?>"></script>
        <script src="<?php echo asset('assets/datatables.min.js'); ?>"></script>
        <title>Eraste Admin</title>
    </head>
    <body>
        <ul>
            <li><a href="<?php echo e(route('homepage','product')); ?>">Product</a></li> 
            <li><a href="<?php echo e(route('home')); ?>">Order</a></li> 
            <li><a href="<?php echo e(route('homepage','user')); ?>">Users</a></li> 
            <li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                            <button type="submit">logout</button>
                            <?php echo csrf_field(); ?>
                        </form>       
            </li> 
         </ul>
        <?php echo $__env->yieldContent('content_admin'); ?>

    </body>
</html>

<?php /**PATH /var/www/html/learn/laravel/proj/resources/views/layouts/admin.blade.php ENDPATH**/ ?>