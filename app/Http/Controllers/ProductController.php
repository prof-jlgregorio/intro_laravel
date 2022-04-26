<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index')->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //instantiate a new ProductModel object
        $product = new Product();

        //set the values, getting the input values from request
        $product->name = $request->input('name');
        $product->value = $request->input('value');
        
        //..persist in data base
        $product->save();
        
        //..redirect the user to route product.index
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //retrieve the product from database using the $id as input parameter
        $product = Product::find($id);

        //if the product found, then return the view passing the $product object 
        if($product){
            return view('product.show')->with('product', $product);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retrive the product from database using the $id as input parameter
        $product = Product::find($id);

        //if product found, then return the edit view, passing the product object
        if($product){
            return view('product.edit')->with('product', $product);
        } else {
            return abort(404);
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
        //retrive the product from database using the $id as input parameter
        $product = Product::find($id);

        //using the retrieved object, set the new values using the data from request
        $product->name = $request->input('name');
        $product->value = $request->input('value');
        
        //persist the object with the new values
        $product->save();
        //..redirect to desired route 
        return redirect(route('product.index'));
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
