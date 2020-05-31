<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class WebController extends Controller
{
    public function index()
    {
        $data =  Product::all();
        return view('web')->with('data',$data);
    }

    public function order($id)
    {
        $order = Product::where('id', $id)->get();
        return view('order')->with('order',$order);
    }

    public function checkout(Request $request)
    {
        $data = [
            'order_code' => "12412215",
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'qty' => $request->input('qty'),
            'address' => $request->input('address'),
            'product' => $request->input('product'),
            'total_order' => $request->input('total_order') * $request->input('qty'),
        ];
        try {
            $insert = Order::create($data);
            return view('response')->with('order',$data)->with('status','Success');
            
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return $errorInfo;
        }        

    }
}
