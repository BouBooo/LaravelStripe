<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders() {
        if(!auth()->user()) return redirect()->route('home');
        
        $user = auth()->user();
        return view('orders', [
            'orders' => $user->orders
        ]);
    }
}
