<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductsController extends Controller
{
    //
    public function index()
    {
        //
        $products=Product::orderBy('id','desc')->paginate(2);
        return view('frontend.pages.product.index')->with('products',$products);
    }

    public function show($slug)
    {
        $product=Product::where('slug',$slug)->first();
        if(!is_null($product)){
          return view('frontend.pages.product.show',compact('product'));
        }else{
          session()->flash('errors','There is no products by this URL...');
          return redirect()->route('products');
        }
    }

}
