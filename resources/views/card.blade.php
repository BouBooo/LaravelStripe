@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)
                <h2>{{ Cart::count() }} item(s) in shopping cart</h2> 
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="dol">About</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $product)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="{{ route('shop.show', $product->model->slug) }}">
                                            <img class="img-thumbnail w-20" src="{{ asset('img/products/'.$product->model->slug.'.jpg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media-body">
                                    <h4>{{ $product->model->name }}</h4>
                                    <p>{{ $product->model->details }}</p>
                                </div>
                            </td>
                            <td>
                            <h5>$ {{ $product->price }}</h5>
                            </td>
                            <td>
                                <div class="product_count"> 
                                <input type="text" name="qty" id="sst" maxlength="12" value="{{ $product->qty }}" title="Quantity:"
                                        class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-link">Remove</button>
                                </form>
                                <form action="{{ route('cart.later', $product->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-link">Save for later</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="#">Update Cart</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td class="border">
                                <h5>Subtotal</h5>
                                <p>Taxe</p>
                                <h4>Total</h4>
                            </td>
                            <td class="border">
                                <h5>{{ Cart::subtotal() }}</h5>
                                <p>{{ Cart::tax() }}</p>
                                <h4>{{ Cart::total() }}</h4>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{ route('shop.index') }}">Continue Shopping</a>
                                    <a class="primary-btn" href="{{ route('checkout.index') }}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
                <h3 class="my-3 text-center">No item in shopping cart</h3>
                <a class="btn btn-link my-5" href="{{ route('shop.index') }}">Continue shopping</a>
            @endif
        </div>
    </div>
    <div class="single-product-slider">
        <div class="container">
            @if (Cart::instance('saveForLater')->count() > 0)
            <h2 class="text-center my-5">{{ Cart::instance('saveForLater')->count() }} item(s) saved for later !</h2> 
            <div class="row">
                    <!-- single product -->
                    @foreach (Cart::instance('saveForLater')->content() as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('img/products/'.$product->model->slug.'.jpg') }}" alt="">
                            <div class="product-details">
                                <h6>{{ $product->model->name }}</h6>
                                <div class="price">
                                    <h6>${{ $product->model->price}}</h6>
                                </div>
                                <div class="prd-bottom">
                                    <form action="{{ route('saveForLater.destroy', $product->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
    
                                        <button type="submit" class="btn btn-link">Remove</button>
                                    </form>
                                    <form action="{{ route('saveForLater.later', $product->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-link">Move to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else 
                    <h3 class="text-center">No items saved for later.</h3>
                @endif 
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

@stop

@section('js')
<script>
    console.log('hello cart page')
    </script>
@stop