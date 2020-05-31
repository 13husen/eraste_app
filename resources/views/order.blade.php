@extends('layouts.app')
@section('content')
<h3>Order Information</h3>
@foreach ($order as $detail)
<p>{{ $detail->code}} - {{  $detail->name }}</p>
<p>Rp. {{ number_format($detail->price,2,',','.') }}</p>
<form action="{!! route('web.checkout') !!}" method="POST">
@csrf
<input name="product" type="hidden" value="{{$detail->name}}" />
<input name="total_order" type="hidden" value="{{$detail->price}}" />
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
@endforeach
@endsection