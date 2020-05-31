<?php $__env->startSection('content'); ?>
<h3>Product</h3>
<table border="1" width="600">
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><img width="120" src="<?php echo e($datas->gambar); ?>"></td>
            <td><?php echo e($datas->name); ?></td>
            <td>Rp <?php echo e(number_format($datas->price,2,',','.')); ?></td>
        <td><a href="<?php echo route('web.order',$datas->id); ?>"><button>Beli</button></a></td>
        </tr>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                

    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/web.blade.php ENDPATH**/ ?>