<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{!! asset('assets/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/datatables.min.js') !!}"></script>
        <title>Eraste Admin</title>
    </head>
    <body>
        <ul>
            <li><a href="{{ route('homepage','product') }}">Product</a></li> 
            <li><a href="{{ route('home') }}">Order</a></li> 
            <li><a href="{{ route('homepage','user') }}">Users</a></li> 
            <li>
                        <form  action="{{ route('logout') }}" method="POST">
                            <button type="submit">logout</button>
                            @csrf
                        </form>       
            </li> 
         </ul>
        @yield('content_admin')

    </body>
</html>

