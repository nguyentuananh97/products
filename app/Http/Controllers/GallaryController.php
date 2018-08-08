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

class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = \DB::table('products')
                        ->join('gallaries', 'gallaries.product_id', '=', 'products.id')
                        ->join('categories', 'categories.id', '=', 'products.category_id')
                        ->select('products.*','gallaries.link as image','categories.name as category_name','slug')->paginate(16);
        $productDetails = ProductDetail::All();
        $categories = Category::All();
        $vendors = Vendor::All();
        $colors = Color::All();
        $sizes = Size::All();
        $gallaries = Gallary::All();
        $carts = Cart::content();
        $total = Cart::total();
    return view('products.gallery',['categories'=>$categories,'vendors'=>$vendors,'colors'=>$colors,'sizes'=>$sizes,'gallaries'=>$gallaries,'products'=>$products,'productDetails'=>$productDetails,'carts'=> $carts,'total'=> $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productDetail.file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['product_id'] = $request->product_id;    
        $files = $request->file('files');
        if(!empty($files)){
            foreach ($files as  $file) {
                $data['image']=$file->store('image');
                $gallary =  new Gallary;
                $gallary['product_id']=$data['product_id'];
                $gallary['link']=$data['image'];
                $gallary->save();
            }
        }
        // dd($data['image']);
        // $image = json_encode($data['image']);

        
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
        //
    }
}
