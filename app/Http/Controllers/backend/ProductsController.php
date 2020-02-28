<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::orderBy('id','desc')->get();
        return view('backend.pages.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.product.create');
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

        $request->validate([
          'title'=>'required|max:150',
          'description'=>'required',
          'price'=>'required|numeric',
          'quantity'=>'required|numeric',
          'category_id'=>'required',
          'brand_id'=>'required',
        ]);

        $product=new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;

        $product->slug=$request->title;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=1;

        $product->save();

        /*if($request->hasFile('product_image'))
        {
          $image=$request->file('product_image');
          $img=time().'.'.$image->getClientOriginalExtension();
          $location=public_path('images/products/'.$img);
          Image::make($image)->save($location);

          $product_image=new ProductImage;
          $product_image->product_id=$product->id;
          $product_image->image=$img;

          $product_image->save();
        }*/

          if(count($request->product_image)>0){
            foreach($request->product_image as $image){
              //$image=$request->file('product_image');
              $img=time().'.'.$image->getClientOriginalExtension();
              $location=public_path('images/products/'.$img);
              Image::make($image)->save($location);

              $product_image=new ProductImage;
              $product_image->product_id=$product->id;
              $product_image->image=$img;

              $product_image->save();
            }
          }





        return redirect()->route('admin.product.create');

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

    public function show2()
    {

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
        $products=Product::find($id);
        return view('backend.pages.product.edit')->with('product',$products);
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
        $request->validate([
          'title'=>'required|max:150',
          'description'=>'required',
          'price'=>'required|numeric',
          'quantity'=>'required|numeric',
          'category_id'=>'required',
          'brand_id'=>'required',
        ]);

        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;

        $product->slug=$request->title;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=1;

        $product->save();



        return redirect()->route('admin.products');
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
        $product=Product::find($id);

        if(!is_null($product)){
          $product->delete();
          session()->flash('success','Product has deleted succesfully!!');
          return back();
        }
    }
}
