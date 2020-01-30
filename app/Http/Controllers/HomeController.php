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
        $array = [];
        $products = Product::take(2)->get();
        $latestProducts = Product::orderBy('id', 'DESC')->get();

        $orders = OrderProduct::all()->groupBy('product_id');
        foreach($orders as $order) {
            array_push($array, $order[0]->product_id);
        }
        $bestsellers = Product::whereIn('id', $array)->get();

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
