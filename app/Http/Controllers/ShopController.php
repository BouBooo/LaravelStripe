<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product', [ 'product' => $product ]);
    }
    
    public function index()
    {
        $products = Product::all();
        return view('shop', [ 'products' => $products ]);
    }
}
