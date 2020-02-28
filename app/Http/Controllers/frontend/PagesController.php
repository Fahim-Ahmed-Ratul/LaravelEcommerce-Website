<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::orderBy('id','desc')->paginate(2);
        return view('frontend.pages.index',compact('products'));
    }

    public function search(Request $request)
    {
      $search=$request->search;
      $products=Product::orWhere('title','like','%'.$search.'%')
      ->orWhere('description','like','%'.$search.'%')
      ->orWhere('price','like','%'.$search.'%')
      ->orWhere('quantity','like','%'.$search.'%')
      ->orWhere('slug','like','%'.$search.'%')
      ->orderBy('id','desc')
      ->paginate(2);
      //return view('frontend.pages.product.search')->with('products',$products);
      return view('frontend.pages.product.search',compact('search','products'));
    }



    public function contact()
    {
      //
      return view('frontend.pages.contact');
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
        //
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
