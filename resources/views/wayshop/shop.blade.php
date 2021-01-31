@extends('wayshop.layouts.master')
@section('content')
<body>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($categories as $cat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$cat->name}}
										</a>
									</h4>
								</div>
								<div id="{{$cat->id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($cat->categories as $key=>$subcat)
											<li><a href="{{url('/categories/'.$subcat->id)}}">{{$subcat->name}} </a></li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<!--features_items-->
					<div class="features_items">
					@if(empty($product_search))
						<h2 class="title text-center">Features Products</h2>
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
					@foreach($products as $product)
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
					@endif

					</div><!--features_items-->
					{{ $products->links()}}


					
				</div>
			</div>
		</div>
	</section>
	

</body>
@endsection