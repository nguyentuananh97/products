<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.color');
    }
    public function getList()
    {
        $colors= Color::orderBy('id','desc');
        return datatables()->eloquent($colors)
            // ->addColumn('action', function($color){
            //     return '<button productId="'.$product->id.'" class="btn btn-sm btn-info" data-title="show" data-toggle="modal" data-target="#show" ><i class="glyphicon glyphicon-eye-open"></i></button>
            //             <button productId="'. $product->id .'" class="btn btn-sm btn-warning" data-title="edit" data-toggle="modal" data-target="#edit"><i class="glyphicon glyphicon-pencil"></i></button>
            //             <button productId="'. $product->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>';
            // })
        ->addColumn('review', function($color){
            return '<div style="background-color: '.$color->name.';width :30px;height:30px;border-radius:5px "> </div>';
        })
        ->rawColumns(['review'])
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
        
        $check = Color::where('name','=',$data['name'])->first();
        if(empty($check))  {
            $color =  new Color;
            $color->create($data);
            return response()->json("yes");
        }else{
            return response()->json("no"); 
        }
       
        
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
