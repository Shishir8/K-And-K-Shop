@extends('wayshop.layouts.master')
@section('content')
<body>
	
	<!--slider-->
	<section id="slider">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
								<!-- <li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li> -->
							</ol>
							<!-- {{asset('front_assets/ ')}} -->

							<div class="carousel-inner">
								@foreach($banners as $key => $banner)

								<div class="item {{$key == 0 ? 'active' : '' }}">
									<div class="col-sm-6">
										<h1><span>E</span>-SHOPPER</h1>
										<h2>Free E-Commerce Template</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<button type="button" class="btn btn-default get">Get it now</button>
									</div>
									<div class="col-sm-6">
										<img src="uploads/banners/{{$banner->image}}" class="girl img-responsive" alt="" />
										<!-- <img src="{{asset('front_assets/images/home/pricing.png')}}"  class="pricing" alt="" /> -->
									</div>
								</div>
								@endforeach

								
								
							</div>
							
							<!-- <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a> -->
						</div>
						
					</div>
				</div>
			</div>
	</section>
	<!--/slider-->



	<!-- Latest Item -->
	<section>
		<div class="container">
			<div class="row">
				
				
				<div class="col-sm-14 padding-right">
					<!--features_items-->
					<div class="features_items">
					@if(empty($product_search))
						<h2 class="title text-center">Latest Products</h2>
					@else
					<h2 class="title text-center">Filter Products</h2>
					@endif


					@if(!empty($product_search))
					@foreach($searchProducts as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="uploads/products/{{$product->image}}" alt="" />
											<h2>{{$product->price}}</h2>
											<p>{{$product->description}}</p>
											<a href="{{url('/products/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail Page</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$product->price}}</h2>
												<p>{{$product->description}}</p>
												<a href="{{url('/products/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail Page</a>
											</div>
										</div>
								</div>
								<!-- <div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->
							</div>
						</div>
						@endforeach
						@else
						@foreach($latestProducts as $product)
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="uploads/products/{{$product->image}}" alt="" />
											<h2>{{$product->price}}</h2>
											<p>{{$product->description}}</p>
											<a href="{{url('/products/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail Page</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$product->price}}</h2>
												<p>{{$product->description}}</p>
												<a href="{{url('/products/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail Page</a>
											</div>
										</div>
										<img src="{{asset('front_assets/images/home/new.png')}}" class="new" alt="" />
										
								</div>
								
							</div>
						</div>
						@endforeach
						@endif
					<!--features_items-->
				</div>
			</div>
		</div>
	</section>
	<!-- Latest Item End -->

	@include('wayshop.featureProduct')

</body>
@endsection