<?php

namespace App\Http\Controllers;

use App\Product;
use App\OrderProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $limit = 8;
        $array = [];

        // News
        $products = Product::take(2)->get();

        // Latest Products
        $latestProducts = Product::orderBy('id', 'DESC')->take($limit)->get();

        // Bestsellers
        $orders = OrderProduct::all()->groupBy('product_id');
        foreach($orders as $order) {
            array_push($array, $order[0]->product_id);
        }
        $bestsellers = Product::whereIn('id', $array)->take($limit)->get();

        return view('home', [
            'products' => $products,
            'latestProducts' => $latestProducts,
            'bestsellers' => $bestsellers
        ]);
    }

    public function contact() {
        return view('contact');
    }
}
