<h4><?php echo e($status); ?> !</h4> 
<table width="400">
    <tr>
        <td><b>Order No</b></td>
        <td><?php echo e($order['order_code']); ?></td>
    </tr>
    <tr>
        <td><b>Product Name</b></td>
        <td><?php echo e($order['name']); ?></td>
    </tr>
    <tr>
        <td><b>Qty</b></td>
        <td><?php echo e($order['qty']); ?></td>
    </tr>       
    <tr>
        <td><b>Total</b></td>
        <td>Rp <?php echo e(number_format($order['total_order'],2,',','.')); ?></td>
    </tr>  
             
</table>
<a href="/">Home</a><?php /**PATH /var/www/html/learn/laravel/proj/resources/views/response.blade.php ENDPATH**/ ?>