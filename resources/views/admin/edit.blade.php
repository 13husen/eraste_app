@extends('layouts.admin')
@section('content_admin')
<h3>Edit</h3>
@if ($data['on'] == "order")
    <form action="{!! route('home.editact') !!}" method="POST">
    @csrf
    @foreach ($data['datas'] as $item)
    <input type="hidden" value="{{$data['on']}}" name="on">
    <input type="hidden" value="{{$data['id']}}" name="id">
    <table width="400">
        <tr>
            <td><label><label>Name</label></label></td>
            <td><input type="text" disabled value="{{$item->name}}" /></td>
        </tr>
        <tr>
            <td><label>Phone</label></td>
            <td><input type="text" disabled value="{{$item->phone}}" /> </td>
        </tr>
        <tr>
            <td><label>Address</label></td>
            <td><textarea type="text" name="name" disabled  >{{$item->address}}</textarea></td>
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
    @endforeach
    <input type="submit" value="Submit" />
    </form>    


@elseif($data['on'] == "product")
<form action="{!! route('home.editact') !!}" method="POST">
    @csrf

    @foreach ($data['datas'] as $item)
    <input type="hidden" value="{{$data['on']}}" name="on">
    <input type="hidden" value="{{$data['id']}}" name="id">
    <table width="400">
        <tr>
            <td><label>Kode Produk</label></td>
            <td><input type="text" name="code" value="{{$item->code}}"/> </td>
        </tr>

        <tr>
            <td><label>Nama Produk</label></td>
            <td><input type="text" name="name" value="{{$item->name}}"/> </td>
        </tr>
        <tr>
            <td><label>Harga Produk</label></td>
            <td><input type="text" name="price" value="{{$item->price}}"/> </td>
        </tr>
    </table>    
    @endforeach
    <input type="submit" value="Submit" />
    </form>  


    
@elseif($data['on'] == "user")
<form action="{!! route('home.editact') !!}" method="POST">
    @csrf

    @foreach ($data['datas'] as $item)
    <input type="hidden" value="{{$data['on']}}" name="on">
    <input type="hidden" value="{{$data['id']}}" name="id">
    <table width="400">
        <tr>
            <td><label>Nama User</label></td>
            <td><input type="text" required name="name" value="{{$item->name}}"/></td>
        </tr>
        <tr>
            <td><label>Email User</label></td>
            <td><input type="email" required name="email" value="{{$item->email}}"/> </td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="password" required name="password" /></td>
        </tr>       
    </table>    
    @endforeach
    <input type="submit" value="Submit" />
    </form>      

@endif


@endsection