<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;
use Datatables;
use DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function page($on)
    {
        if($on == "product"){
            $view =  view('admin.product');
        } elseif($on == "user"){
            $view =  view('admin.user');
        }
        return $view;
    }

    public function orders()
    {
        $orders = Order::select(['id','order_code', 'product', 'total_order', 'status']);

        return Datatables::of($orders)
            ->addColumn('action', function ($order) {
                return '<a href="'.route("home.delete").'?id='.$order->id.'&on=order">Delete</a> | <a href="'.route("home.edit").'?id='.$order->id.'&on=order">Edit</a> ';
            })
            ->addColumn('total_order', function ($product) {
                return 'Rp '.number_format($product->total_order,2,',','.');
            })                        
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action','total_order'])
            ->make(true);
    }    

    public function products()
    {
        $products = Product::select(['id','code', 'gambar', 'name', 'price']);

        return Datatables::of($products)
            ->addColumn('action', function ($product) {
                return '<a href="'.route("home.delete").'?id='.$product->id.'&on=product">Delete</a> | <a href="'.route("home.edit").'?id='.$product->id.'&on=product">Edit</a> ';
            })
            ->addColumn('gambar', function ($product) {
                return '<img width="120" src="'.$product->gambar.'" />';
            })   
            ->addColumn('price', function ($product) {
                return 'Rp '.number_format($product->price,2,',','.');
            })            
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action', 'gambar','price'])
            ->make(true);
    }        

    public function users()
    {
        $users = User::select(['id','name', 'email']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="'.route("home.delete").'?id='.$user->id.'&on=user">Delete</a> | <a href="'.route("home.edit").'?id='.$user->id.'&on=user">Edit</a> ';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action'])
            ->make(true);
    }        


    public function delete(Request $request){
        $id = $request->id;
        $on = $request->on;
        try {
            DB::transaction(function() use ($id,$on,&$status) {
                if($on == "order"){
                    $action = Order::find($id)->delete();
                } elseif($on == "product"){
                    $action = Product::find($id)->delete();
                } elseif($on == "user"){
                    $action = User::find($id)->delete();
                } else{ $action = false;}
                $status = ($action ? "Sukses Hapus Data" : "Gagal Menghapus Data");
            });
            return view('admin.adminres')->with("message",$status);

        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return $errorInfo;
        } 
    }


    public function edit(Request $request){
        $id = $request->id;
        $on = $request->on;        
        if($on == "order"){
            $orders = Order::where('id', $id)->get();
            $data = ['id' => $id,'on' =>'order','datas' => $orders];
        } elseif($on == "product"){
            $product = Product::where('id', $id)->get();
            $data = ['id' => $id,'on' =>'product','datas' => $product];
        } elseif($on == "user"){
            $user = User::where('id', $id)->get();
            $data = ['id' => $id,'on' =>'user','datas' => $user];
        } else{ $data = [];}        

        return view('admin.edit')->with('data',$data);
    }    

    public function add(Request $request){
        $on = $request->on;        
        if($on == "product"){
            $data = ['on' =>'product'];
        } elseif($on == "user"){
            $data = ['on' =>'user'];
        } else{ $data = [];}        
        return view('admin.add')->with('data',$data);
    }    

    public function add_action(Request $request){
        $on = $request->input('on');
        try {        
        DB::transaction(function() use ($on,$request,&$status) {
          if($on == "product"){
            $gambar = ['https://asset-a.grid.id/crop/0x0:0x0/360x240/photo/2018/10/03/624981849.jpg',"https://ecs7.tokopedia.net/img/cache/700/product-1/2016/11/25/6187318/6187318_04f90035-20c8-4460-ae84-f6e7e82b6a5b_450_300.jpg","https://pngimage.net/wp-content/uploads/2018/06/mascara-png.png","https://merekbagus.co.id/wp-content/uploads/2019/07/Merk-Bedak-Tabur-Untuk-Kulit-Kering.jpg","https://cf.shopee.co.id/file/7bfd7ce5e080410864a4be26b2c74474"];
            $insert = ['gambar'=> $gambar[rand(0,4)],'id' => null,'code' => $request->input('code'), 'name' => $request->input('name'),'price' =>$request->input('price') ];
            $action = Product::insert($insert);
          } elseif($on == "user"){
            $insert = ['name' => $request->input('name'),'email' =>$request->input('email'),'password' => Hash::make($request->input('password')) ];
            $action = User::insert($insert);
          } else{ $insert = []; $action = false; }
          $status = ($action ? "Successfully Insert Data" : "Failed To Insert Data");           
        });
        return view('admin.adminres')->with("message",$status);
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return $errorInfo;
        } 
    }  

    
    public function edit_action(Request $request){
        $on = $request->input('on');
        $id = $request->input('id');
        try {        
        DB::transaction(function() use ($id,$on,$request,&$status) {
          if($on == "order"){
            $update = ['status' => $request->input('status')];
            $action = Order::find($id)->update($update);
          } elseif($on == "product"){
            $update = ['code'=> $request->input('code'), 'name' => $request->input('name'),'price' =>$request->input('price') ];
            $action = Product::find($id)->update($update);
          } elseif($on == "user"){
             if($request->input('password') != "" && $request->input('password') != null){
                $update = ['name' => $request->input('name'),'email' =>$request->input('email'),'password' => Hash::make($request->input('password')) ];
            } else{
                $update = ['name' => $request->input('name'),'email' =>$request->input('email') ];
            }
            $action = User::find($id)->update($update);

          } else{ $update = []; $action = false; }
          $status = ($action ? "Sukses Update Data" : "Gagal Update Data");           
        });
        return view('admin.adminres')->with("message",$status);
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return $errorInfo;
        } 
    }        
}
