@extends('layouts.admin')
@section('content_admin')
<h3>Add</h3>
@if($data['on'] == "product")
<form action="{!! route('home.addact') !!}" method="POST">
    @csrf
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


    
@elseif($data['on'] == "user")
<form action="{!! route('home.addact') !!}" method="POST">
    @csrf
    <table width="400">
        <input  type="hidden" name="on" value="user" />
        <tr>
            <td><label>Nama User</label></td>
            <td><input required type="text" name="name" />  </td>
        </tr>
        <tr>
            <td><label>Email User</label></td>
            <td><input required type="email" name="email"/>   </td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input required type="password"  name="password" /> </td>
        </tr>       
    </table>        
    <input type="submit" value="Submit" />
    </form>      

@endif
@endsection