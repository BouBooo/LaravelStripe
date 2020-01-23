<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
    public function destroy($id) {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success_message', 'Product as been removed !');
    }

    public function addToCart($id) {
        $item = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Product has been added to Cart !');
    }
}
