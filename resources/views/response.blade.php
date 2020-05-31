<h4>{{ $status }} !</h4> 
<table width="400">
    <tr>
        <td><b>Order No</b></td>
        <td>{{$order['order_code']}}</td>
    </tr>
    <tr>
        <td><b>Product Name</b></td>
        <td>{{$order['name']}}</td>
    </tr>
    <tr>
        <td><b>Qty</b></td>
        <td>{{$order['qty']}}</td>
    </tr>       
    <tr>
        <td><b>Total</b></td>
        <td>Rp {{number_format($order['total_order'],2,',','.')}}</td>
    </tr>  
             
</table>
<a href="/">Home</a>