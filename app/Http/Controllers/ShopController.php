<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product', [ 
            'product' => $product,
        ]);
    }
    
    public function index()
    {
        if(request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
        } else {
            $products = Product::all();
        }
        $categories = Category::all();
        
        return view('shop', [ 
            'products' => $products,
            'categories' => $categories 
        ]);
    }
}
