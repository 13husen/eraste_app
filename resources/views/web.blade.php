@extends('layouts.app')
@section('content')
<h3>Product</h3>
<table border="1" width="600">
    <tbody>
        @foreach($data as $datas)
        <tr>
            <td><img width="120" src="{{ $datas->gambar }}"></td>
            <td>{{ $datas->name }}</td>
            <td>Rp {{ number_format($datas->price,2,',','.') }}</td>
        <td><a href="{!! route('web.order',$datas->id) !!}"><button>Beli</button></a></td>
        </tr>
            
        @endforeach                

    </tbody>
</table>
@endsection
