@extends('layouts.master')

@section('content')
    
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{ route('shop.index') }}">Shop</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						@foreach ($categories as $category)
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							<a href="{{ route('shop.index', [ 'category' => $category->slug ]) }}">
								{{ $category->name }}<span class="number">( {{ count($category->products) }} )</span>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="sidebar-categories mb-5">
					<div class="head">Price</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							<a href="{{ route('shop.index', [ 'category' => $category->slug ]) }}">
	
								< $5
							</a>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							<a href="{{ route('shop.index', [ 'category' => $category->slug ]) }}">
	
								$6 - $10
							</a>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							<a href="{{ route('shop.index', [ 'category' => $category->slug ]) }}">
	
								$11 - $15
							</a>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							<a href="{{ route('shop.index', [ 'category' => $category->slug ]) }}">
	
								$16 - $20
							</a>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
							<a href="{{ route('shop.index', [ 'category' => $category->slug ]) }}">
	
								> $20
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="dropdown">
							<a href="{{ route('shop.index', [ 'category' => request()->category, 'sort' => 'low_high']) }}">Low to high</a>
							<a href="{{ route('shop.index', [ 'category' => request()->category, 'sort' => 'high_low']) }}">High to low</a>
					</div>
					<div class="pagination ml-auto">
						{{ $products->appends(request()->input())->links() }}
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">

                        @foreach ($products as $product)
                        <!-- single product -->
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<a href="{{ route('shop.show', $product->slug) }}" class="">
									<img class="img-fluid" src="{{ Voyager::image($product->image) }}" alt="">
								</a>
								<div class="product-details">
									<h6>{{ $product->name }}</h6>
									<div class="price">
										<h6>$ {{ $product->price }}</h6>
									</div>
									<div class="prd-bottom">

										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
                        @endforeach

					</div>
				</section>
				<!-- End Best Seller -->
			</div>
		</div>
	</div>

@stop