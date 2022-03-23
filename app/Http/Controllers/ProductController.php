<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $products = ['PS5', 'Nintendo Switch', 'X-Box One'];

    public function index(){
        return view('product')->with('products', $this->products);
    }


    public function add($product){
        $this->products[] = $product;
        $this->index();
    }

    public function promotion(Request $request){
        $name = $request->get('name') ? $request->get('name') : "Sem Promoção!";
        $value = $request->get('value') ? $request->get('value') : 0;
        echo "<h1>$name</h1>";
        echo "<h1>$value</h1>";
    }



}
