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
        $category = Category::where('id', $product->category_id)->firstOrFail();
        return view('product', [ 
            'product' => $product,
            'category' => $category
        ]);
    }
    
    public function index()
    {
        $pagination = 3;
        $categories = Category::all();

        if(request()->category) {
            $category = Category::where('slug', request()->category)->get();
            $products = Product::where('category_id', $category[0]->id);
        } else {
            $products = Product::take(4);
        }

        if(request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        }
        else if (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'DESC')->paginate($pagination);
        }
        else {
            $products = $products->paginate($pagination);
        }
        
        return view('shop', [ 
            'products' => $products,
            'categories' => $categories 
        ]);
    }
}
