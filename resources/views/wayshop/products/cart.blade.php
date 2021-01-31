@extends('wayshop.layouts.master')
@section('content')


	<section id="cart_items">
    @if(Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
               <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            
            @if(Session::has('flash_message_success'))
            <div class="alert alert-sm alert-success alert-block" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
               <strong>{!! session('flash_message_success') !!}</strong>
            </div>
			@endif
			
			
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="{{{ (Request::is('/cart') ? 'active' : '') }}}"><strong>Shopping Cart</strong></li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php $total_amount = 0; ?>
                       @foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('/uploads/products/'.$cart->image)}}" alt="" width="100" height="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product_name}}</a></h4>
                                <p>Code: {{$cart->product_code}} | Size : {{$cart->size}}</p>
							</td>
							<td class="cart_price">
								<p>Rs {{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" min="0" step="1">
                                    @if($cart->quantity>1)
                                      <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
                                    @endif 
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rs {{$cart->price*$cart->quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Apply Coupon IF you have for discount</h3>
				
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_info">
							<li class="single_field zip-field">
                            <form action="{{url('/cart/apply-coupon')}}" method="post"> {{csrf_field()}}
								<label>Enter Coupon Code:</label>
                                <input type="text" class="form-control" placeholder="Enter your coupon code" name="coupon_code" aria-label="Coupon code">
                                <!-- <a class="btn btn-default check_out" type="submit">Continue</a> -->
                                <button class="btn btn-default check_out" type="submit">Apply Coupon</button>
                            </form>
                            </li>
						</ul>
					</div>
                </div>
                

				<div class="col-sm-6">
					<div class="total_area">
						<ul>
                        @if(!empty(Session::get('CouponAmount')))
							<li>Sub Total <span> Rs. <?php echo $total_amount; ?></span></li>
							<li>Coupon Discount <span> Rs <?php echo Session::get('CouponAmount'); ?></span></li>
                            <li>Grand Total <span> Rs. <?php echo $total_amount - Session::get('CouponAmount'); ?></span></li>
                            @else
                            <li>Grand Total <span> Rs. <?php echo $total_amount; ?> </span></li>
                            @endif
						</ul>
							<a class="btn btn-default update" href="{{url('/checkout')}}">Update</a>
							<!-- <a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a> -->
					</div>
                </div>
                

                
			</div>
		</div>
	</section><!--/#do_action-->



@endsection