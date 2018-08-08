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


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        return view('admin.product.index',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries]);
    }
    public function getList()
    {
        $products= Product::orderBy('id','desc');
        return datatables()->eloquent($products)
            ->addColumn('action', function($product){
                return '<button productId="'.$product->id.'" class="btn btn-sm btn-primary addImage" data-title="upImg" data-toggle="modal" data-target="#upImg" ><i class="glyphicon glyphicon-picture"></i></button>
                    <button productId="'.$product->id.'" class="btn btn-sm btn-info addDetail" data-title="show" data-toggle="modal" data-target="#show" ><i class="fa fa-plus"></i></button>
                        <button productId="'. $product->id .'" class="btn btn-sm btn-warning editProduct" data-title="edit" data-toggle="modal" data-target="#edit"><i class="glyphicon glyphicon-pencil"></i></button>
                        <button productId="'. $product->id .'" class="btn btn-sm btn-danger deleteProduct"><i class="glyphicon glyphicon-trash"></i></button>';
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
        $products = Product::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        return view('admin.product.create',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();       
        $product =  new Product;
        $product->create($data);
        return response()->json("yes");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return response()->json($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::All();
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        foreach ($products as $product) {
            if($product->id == $id){
                $code = $product->code;
                foreach ($productDetails as $productDetail) {
                    if($productDetail->product_code == $code){
                       return view('admin.product.edit',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'product'=>$product,'productDetail'=>$productDetail]); 
                    }
                }                
            }
        }
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
        $data = $request->all();       
        $product =  Product::find($id);
        $product->update($data);
        return response()->json("yes");
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        ProductDetail::where('product_id','=',$id)->delete();
        Gallary::where('product_id','=',$id)->delete();
        return response()->json(['eror'=>false]);
    }
    public function addToCart(Request $request){
        $data = $request->all();
        $product = Product::where('id',$data['product_id'])->first();
        $cart = Cart::add([
            ['id' => $data['product_id'], 'name' => $product['name'], 'qty' => $data['quantity'], 'price' =>  $product['price'] , 'options' => ['size' => $data['size'],'color' => $data['color']]]
        ]);
        // $carts = Cart::destroy();
        
        // dd($cart);
        return response()->json('yes');
        
    }
    public function editCart($rowId,Request $request){
        Cart::update($rowId,$request['quantity'] ); 
        return response()->json('yes');
    }
    public function deleteCart($rowId){
        Cart::remove($rowId);
        return response()->json('yes');
    }
}
