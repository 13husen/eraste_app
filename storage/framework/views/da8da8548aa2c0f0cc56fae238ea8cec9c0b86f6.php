<?php $__env->startSection('content_admin'); ?>
<h3>Edit</h3>
<?php if($data['on'] == "order"): ?>
    <form action="<?php echo route('home.editact'); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php $__currentLoopData = $data['datas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" value="<?php echo e($data['on']); ?>" name="on">
    <input type="hidden" value="<?php echo e($data['id']); ?>" name="id">
    <table width="400">
        <tr>
            <td><label><label>Name</label></label></td>
            <td><input type="text" disabled value="<?php echo e($item->name); ?>" /></td>
        </tr>
        <tr>
            <td><label>Phone</label></td>
            <td><input type="text" disabled value="<?php echo e($item->phone); ?>" /> </td>
        </tr>
        <tr>
            <td><label>Address</label></td>
            <td><textarea type="text" name="name" disabled  ><?php echo e($item->address); ?></textarea></td>
        </tr>       
        <tr>
            <td><label>status : </label></td>
            <td><select name="status">
                <option value="pending">Pending</option>
                <option value="terima">Terima</option>
                <option value="tolak">Tolak</option>
            </select></td>
        </tr>            
    </table>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="submit" value="Submit" />
    </form>    


<?php elseif($data['on'] == "product"): ?>
<form action="<?php echo route('home.editact'); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <?php $__currentLoopData = $data['datas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" value="<?php echo e($data['on']); ?>" name="on">
    <input type="hidden" value="<?php echo e($data['id']); ?>" name="id">
    <table width="400">
        <tr>
            <td><label>Kode Produk</label></td>
            <td><input type="text" name="code" value="<?php echo e($item->code); ?>"/> </td>
        </tr>

        <tr>
            <td><label>Nama Produk</label></td>
            <td><input type="text" name="name" value="<?php echo e($item->name); ?>"/> </td>
        </tr>
        <tr>
            <td><label>Harga Produk</label></td>
            <td><input type="text" name="price" value="<?php echo e($item->price); ?>"/> </td>
        </tr>
    </table>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="submit" value="Submit" />
    </form>  


    
<?php elseif($data['on'] == "user"): ?>
<form action="<?php echo route('home.editact'); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <?php $__currentLoopData = $data['datas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" value="<?php echo e($data['on']); ?>" name="on">
    <input type="hidden" value="<?php echo e($data['id']); ?>" name="id">
    <table width="400">
        <tr>
            <td><label>Nama User</label></td>
            <td><input type="text" name="name" value="<?php echo e($item->name); ?>"/></td>
        </tr>
        <tr>
            <td><label>Email User</label></td>
            <td><input type="text" name="email" value="<?php echo e($item->email); ?>"/> </td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="password" name="password" /></td>
        </tr>       
    </table>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="submit" value="Submit" />
    </form>      

<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/admin/edit.blade.php ENDPATH**/ ?>