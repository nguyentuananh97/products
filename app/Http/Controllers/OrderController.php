<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductDetail;
use App\Category;
use App\Vendor;
use App\Gallary;
use App\Size;
use App\Color;
use App\Order;
use App\OrderDetail;
use Yajra\Datatables\Datatables;
use Cart;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::All();
        return view('admin.cart',['orders'=>$orders]);
    }
    public function getList(){
        $orders= \DB::table('orders')
                    ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                    ->join('product_details','order_details.product_detail_id','=','product_details.id')
                    ->join('products','product_details.product_id','=','products.id')
                    ->select('order_details.*','orders.id as orderID','sum','code')
                    ->orderBy('orders.id','desc');
        return datatables()->of($orders)
            ->addColumn('action', function($order){
                return '<button orderId="'. $order->orderID .'" class="btn btn-sm btn-danger deleteProduct"><i class="glyphicon glyphicon-trash"></i></button>';
            })
        // ->addColumn('photo', function($user){
        //     return '<img class="img-fluid" src="'. $user->avatar .'">';
        // })
        ->rawColumns(['action'])
        ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $order = new Order;
            $order->customer_id = session('id');
            $order->code=$cart->rowId;
            $order->sum = $cart->qty*$cart->price+$cart->qty*$cart->price*21/100;
            $order->save();

            $color = Color::where('name',$cart->options->color)->first()->id;
            $size = Size::where('name',$cart->options->size)->first()->id;

            $productDetail = ProductDetail::where('product_id',$cart->id)
                                          ->where('color_id',$color)
                                          ->where('size_id',$size)
                                          ->first()->id;

            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->quantity = $cart->qty;
            $orderDetail->price = $cart->price;
            $orderDetail->product_detail_id = $productDetail;
            $orderDetail->save();

            
        }
        Cart::destroy();
        return response()->json('yes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        OrderDetail::where('order_id',$id)->delete();
        return response()->json(['eror'=>false]);
    }
}
