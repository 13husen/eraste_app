<?php $__env->startSection('content'); ?>
<h3>Order Information</h3>
<?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p><?php echo e($detail->code); ?> - <?php echo e($detail->name); ?></p>
<p>Rp. <?php echo e(number_format($detail->price,2,',','.')); ?></p>
<form action="<?php echo route('web.checkout'); ?>" method="POST">
<?php echo csrf_field(); ?>
<input name="product" type="hidden" value="<?php echo e($detail->name); ?>" />
<input name="total_order" type="hidden" value="<?php echo e($detail->price); ?>" />
<table width="400">
    <tr>
        <td><label>Qty</label></td>
        <td><input required name="qty" min="0"  type="number" /></td>
    </tr>
    <tr>
        <td><label>Name</label></td>
        <td><input required name="name" type="text" /></td>
    </tr>
    <tr>
        <td><label>Phone</label></td>
        <td><input name="phone" required type="text" /></td>
    </tr>       
    <tr>
        <td><label>Address</label></td>
        <td><textarea name="address" required></textarea></td>
    </tr>            
</table>
<input  type="submit" >    
<a href="/"><input  type="button" value="back" ></a>    
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/order.blade.php ENDPATH**/ ?>