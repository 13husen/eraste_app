<?php $__env->startSection('content_admin'); ?>
<h3>Add</h3>
<?php if($data['on'] == "product"): ?>
<form action="<?php echo route('home.addact'); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="on" value="product" />
    <table width="400">
        <tr>
            <td><label>Kode Produk</label></td>
            <td><input required type="text" name="code"/> </td>
        </tr>

        <tr>
            <td><label>Nama Produk</label></td>
            <td><input required type="text" name="name"/></td>
        </tr>
        <tr>
            <td><label>Harga Produk</label></td>
            <td><input required type="number" name="price"/></td>
        </tr>
    </table>  
    <input type="submit" value="Submit" />
    </form>  


    
<?php elseif($data['on'] == "user"): ?>
<form action="<?php echo route('home.addact'); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <table width="400">
        <input  type="hidden" name="on" value="user" />
        <tr>
            <td><label>Nama User</label></td>
            <td><input required type="text" name="name" />  </td>
        </tr>
        <tr>
            <td><label>Email User</label></td>
            <td><input required type="text" name="email"/>   </td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input required type="password"  name="password" /> </td>
        </tr>       
    </table>        
    <input type="submit" value="Submit" />
    </form>      

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/admin/add.blade.php ENDPATH**/ ?>