<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('checkout.success')->with('success_message', 'Payement has been accepted with success !');
        }
        catch(\Stripe\Exception\CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    public function success() {
        return view('thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
