@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email">
                            <span class="placeholder" data-placeholder="Email Address"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="province" name="province">
                            <span class="placeholder" data-placeholder="Country"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="address" name="address">
                            <span class="placeholder" data-placeholder="Address line 01"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city">
                            <span class="placeholder" data-placeholder="Town/City"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Postcode/ZIP">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Payement</h3>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                                    <span class="placeholder" data-placeholder="Name on card"></span>
                                </div>
                                <div class="form-group">
                                    <label for="card-element">Credit card</label>
                                </div>
                                <div id="card-element">
                                </div>
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                        <button type="submit" class="primary-btn my-3">Proceed to Paiement</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            @foreach (Cart::content() as $element)
                                <li>
                                    <a href="#">
                                        {{ $element->name }} 
                                        <span class="middle">x {{ $element->qty }}</span> 
                                        <span class="last">$ {{ $element->price * $element->qty }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>$ {{ Cart::subtotal()}}</span></a></li>
                            <li><a href="#">Tax <span>$ {{ Cart::tax() }}</span></a></li>
                            <li><a href="#">Total <span>$ {{ Cart::total()}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

@stop