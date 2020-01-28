<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('card');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        // Cart::add('293ad', 'Product 1', 1, 9.99);
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Produit ajouté à votre panier !');

    }

    public function clear() {
        Cart::destroy();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Product as been removed !');
    }

    public function saveForLater($id) {
        dd($cartItem);
        if($cartItem) {
            $item = Cart::get($id);
            Cart::remove($id);
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Product has been saved for later !');
    }
}
