<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function home()
    {
        // dd(View::exists('home'));
        $products = Product::inRandomOrder()->take(4)->get();
        return view('home', ['products' => $products]);
    }

    public function contact()
    {
        return view('contact');
    }
}
