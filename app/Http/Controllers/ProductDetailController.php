<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ProductDetail;
use App\Category;
use App\Vendor;
use App\Gallary;
use App\Size;
use App\Color;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use DB;
use Cart;

class ProductDetailController extends Controller
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
        return view('admin.productDetail.index',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products]);
    }
    public function getList()
    {
        $productDetails= ProductDetail::orderBy('id','desc');
        return datatables()->eloquent($productDetails)
            ->addColumn('action', function($productDetail){
                return '<button productDetailId="'.$productDetail->id.'" class="btn btn-sm btn-info" data-title="show" data-toggle="modal" data-target="#show" ><i class="glyphicon glyphicon-eye-open"></i></button>
                        <button productDetailId="'. $productDetail->id .'" class="btn btn-sm btn-warning" data-title="edit" data-toggle="modal" data-target="#edit"><i class="glyphicon glyphicon-pencil"></i></button>
                        <button productDetailId="'. $productDetail->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>';
            })
        // ->addColumn('photo', function($user){
        //     return '<img class="img-fluid" src="'. $user->avatar .'">';
        // })
        ->rawColumns(['action'])
        ->toJson();
    }
    public function list($product_id){
        $productDetails= \DB::table('product_details')
                    ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
                    ->join('colors', 'colors.id', '=', 'product_details.color_id')
                    ->select('product_details.*', 'colors.name as color','sizes.name as size')
                    ->where('product_details.product_id','=',$product_id)->orderBy('product_details.id','desc');
        return datatables()->of($productDetails)
            ->addColumn('action', function($productDetail){
                return '<button productDetailId="'. $productDetail->id .'" class="btn btn-sm btn-warning editDetail" data-title="editDetail" data-toggle="modal" data-target="#editDetail"><i class="glyphicon glyphicon-pencil"></i></button>
                        <button productDetailId="'. $productDetail->id .'" class="btn btn-sm btn-danger deleteDetail"><i class="glyphicon glyphicon-trash"></i></button>';
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
    public function store(Request $request)
    {
        $data = $request->all();
        $productDetail =  new ProductDetail;
        $productDetail->product_id = $data['product_id'];
        $productDetail->size_id = $data['size_id'];
        $productDetail->color_id = $data['color_id'];
        $productDetail->quantity = $data['quantity'];
        $productDetail->save();
        return response()->json(['yes']);

        

        return response()->json(["yes"]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productDetail = ProductDetail::find($id);
        return response()->json($productDetail);
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
        $data = $request->all();       
        $productDetail =  ProductDetail::find($id);
        $productDetail->update($data);
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
         ProductDetail::find($id)->delete();
        return response()->json(['eror'=>false]);
    }
    public function index_products(){
        $products = Product::All();
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.index',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
    public function list_products(){
        $user = Auth::user();
        if(!empty($user)){
            session(['id'=>$user->id,'name'=> $user->name]);
        }
        
        $products = \DB::table('products')
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')->paginate(9);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.list',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
    public function product_products($id){
        $category_id = Product::find($id)->category_id;
        $fullproducts = \DB::table('products')
                        ->where('products.id','<>',$id)
                        ->where('category_id',$category_id)
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')->get();
        $categories = Category::All();
        $gallaries = Gallary::All();
        $vendors = Vendor::All();
        $carts = Cart::content();
        $total = Cart::total();
        $products = \DB::table('products')
                        ->where('products.id',$id)
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')->first();
        $productDetails = \DB::table('product_details')
                    ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
                    ->join('colors', 'colors.id', '=', 'product_details.color_id')
                    ->select('product_details.*', 'colors.name as color','sizes.name as size')
                    ->where('product_details.product_id','=',$id)->orderBy('product_details.id','desc')->get();
        // dd($productDetail);
        $sizes=\DB::table('product_details')
                        ->where('product_id',$id)
                        ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
                        ->select('sizes.name as size')
                        ->distinct('size.id')->get();
        $colors=\DB::table('product_details')
                        ->where('product_id',$id)
                        ->join('colors', 'colors.id', '=', 'product_details.color_id')
                        ->select('colors.name as color')
                        ->distinct('color.id')->get();
        return view('products.product',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total,'fullproducts'=> $fullproducts]);
    }
    public function findProduct($product_id){
        $product = \DB::table('products')
                        ->where('products.id',$product_id)
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')->first();
        $productDetail = \DB::table('product_details')
                    ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
                    ->join('colors', 'colors.id', '=', 'product_details.color_id')
                    ->select('product_details.*', 'colors.name as color','sizes.name as size')
                    ->where('product_details.product_id','=',$product_id)->orderBy('product_details.id','desc')->get();
        // dd($productDetail);
        $sizes=\DB::table('product_details')
                        ->where('product_id',$product_id)
                        ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
                        ->select('sizes.name as size')
                        ->distinct('size.id')->get();
        $colors=\DB::table('product_details')
                        ->where('product_id',$product_id)
                        ->join('colors', 'colors.id', '=', 'product_details.color_id')
                        ->select('colors.name as color')
                        ->distinct('color.id')->get();
        return response()->json(['detail'=>$productDetail,'sizes'=>$sizes,'colors'=>$colors,'product'=>$product]);
    }
    public function findByColor($product_id,$color){
        $color_id = Color::where('name',$color)->first()->id;
        $sizes=\DB::table('product_details')
                        ->where('product_id',$product_id)
                        ->where('color_id',$color_id)
                        ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
                        ->select('sizes.name as size')
                        ->distinct('size.id')->get();
        return response()->json(['sizes'=>$sizes]);
    }
    public function find_to_size($id){
        $products = \DB::table('product_details')
                        ->where('size_id',$id)
                        ->join('products', 'products.id', '=', 'product_details.product_id')
                        ->select('products.*')->distinct('products.id')
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')
                        ->paginate(9);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.list',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
    public function find_to_color($id){
        $products = \DB::table('product_details')
                        ->where('color_id',$id)
                        ->join('products', 'products.id', '=', 'product_details.product_id')
                        ->select('products.*')->distinct('products.id')
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')
                        ->paginate(9);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.list',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
    public function search($info){
        $products = \DB::table('products')
                        ->where([ ['name', 'LIKE', '%' . $info . '%'],
                                ])
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')
                        ->paginate(9);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.list',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
    public function find_to_price($min,$max){
        $products = \DB::table('products')
                        ->where('price','>',$min)
                        ->where('price','<',$max)
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')
                        ->paginate(9);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.list',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
    public function find_to_cate($id){
        $products = \DB::table('products')
                        ->where('products.category_id',$id)
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->select('products.*','gallaries.link as image')
                        ->paginate(9);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
        return view('products.list',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }
}
