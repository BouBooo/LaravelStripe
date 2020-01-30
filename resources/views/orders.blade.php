@extends('layouts.master')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Orders page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<i class="fas fa-arrow-right mx-2"></i></a>
                    <a href="{{ route('shop.index') }}">Orders</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container my-5">
    <div class="orders">
        <h2 class="text-center">Orders Details</h2>
        @foreach($orders as $order)
        <div class="table-responsive order_details_table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>x {{ $product->pivot->quantity }}</td>
                        <td>$ {{ round($product->price * $product->pivot->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Subtotal</b></td>
                        <td></td>
                        <td>$ {{ round($order->paiement_subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Tax</b></td>
                        <td></td>
                        <td>$ {{ round($order->paiement_tax, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td></td>
                        <td>$ {{ round($order->paiement_total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</div>
@stop