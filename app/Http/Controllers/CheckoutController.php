<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($tax, $discount, $subtotal, $newTax, $total); 
        return view('checkout', [
            'tax' => $this->paiementInfos()->get('tax'),
            'discount' => $this->paiementInfos()->get('discount'),
            'subtotal' => $this->paiementInfos()->get('subtotal'),
            'newTax' => $this->paiementInfos()->get('newTax'),
            'total' => $this->paiementInfos()->get('total')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $contents = Cart::content()->map(function($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $this->paiementInfos()->get('total') * 100,
                'currency' => 'eur',
                'description' => 'My Website Order',
                'source' => $request->stripeToken,
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson()
                ]
            ]); 
            
            $this->createOrder($request);
        
            return redirect()->route('checkout.success')->with('success_message', 'Payement has been accepted with success !');
        }
        catch(\Stripe\Exception\CardErrorException $e) {
            throw $e;
        }
    }

    public function success() {
        if(!session()->has('success_message')) {
            return redirect()->route('home');
        }

        $order = Order::latest()->first();
        $products = Cart::content();
        Cart::destroy();
        
        return view('thanks', [
            'order' => $order,
            'products' => $products
        ]);
    }


    private function paiementInfos() {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $subtotal = (Cart::subtotal() - $discount);
        $newTax = $subtotal * $tax;
        $total = $subtotal * (1 + $tax);

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'subtotal' => $subtotal,
            'newTax' => $newTax,
            'total' => $total
        ]);
    }

    private function createOrder($request) {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'paiement_email' => $request->email,
            'paiement_country' => $request->province,
            'paiement_address' => $request->address,
            'paiement_city' => $request->city,
            'paiement_postalcode' => $request->postalcode,
            'paiement_card_name' => $request->name_on_card,
            'paiement_discount' => session()->get('coupon')['name'] ?? null,
            'paiement_subtotal' => $this->paiementInfos()->get('subtotal'),
            'paiement_tax' => $this->paiementInfos()->get('newTax'),
            'paiement_total' => $this->paiementInfos()->get('total')
        ]);

        // dd($order);

        foreach(Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty
            ]);
        }
    }
}
