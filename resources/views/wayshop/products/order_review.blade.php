@extends('wayshop.layouts.master')
@section('content')

<div class="contact-box-main">

    <div class="container">
    
        <div class="row">
            <div class="breadcrumbs">
                    <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/cart')}}">Shopping Cart</a></li>
                    <li><a href="{{url('/checkout')}}">Check Out</a></li>
                    <li class="{{{ (Request::is('/order-review') ? 'active' : '') }}}"><strong>Final Order-Review</strong></li>
                    </ol>
                </div>
            <div class="col-lg-6 col-sm-12">
                <div class="contact-form-right">
                    <h2>Billing Address</h2>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$userDetails->name}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$userDetails->address}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$userDetails->city}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$userDetails->state}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$userDetails->country}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{$userDetails->pincode}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  {{$userDetails->mobile}}
                                </div>
                            </div>
                            
                            
                        </div>
                   
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="contact-form-right">
                    <h2>Shipping Details</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->name}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->address}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->city}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->state}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->country}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->pincode}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{$shippingDetails->mobile}}
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        
        </div>

    </div>

</div>

<!-- Start Cart  -->
<section id="cart_items">
		<div class="container">
			<!-- <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div> -->
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
				<h3>Your Final Payment</h3>
				
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Carr Sub Total <span> Rs. {{$total_amount}}</span></li>
							<li>Shipping Cost (+) <span> Rs. 0</span></li>
							<li>Coupon Discount <span>
                                @if(!empty(Session::get('CouponAmount')))
                                PKR {{Session::get('CouponAmount')}}
                                @else
                                PKR 0
                                @endif
                            </span></li>
                            <li>Grand Total <span> Rs. {{$grand_total = $total_amount - Session::get('CouponAmount')}}</span></li>
                            
						</ul>
					</div>
                </div>
                
                <form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="post"> {{csrf_field()}}
                    <input type="hidden" value="{{$grand_total}}" name="grand_total">
                        <hr class="mb-4">
                        <div class="title-left">
                            <h3>Payments</h3>
                        </div>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="payment_method" value="cod"  type="radio" class="custom-control-input cod">
                                <label class="custom-control-label" for="credit">Cash On Delivery</label>
                            </div>
                            <!-- <div class="custom-control custom-radio">
                                <input id="debit" name="payment_method" value="paypal" type="radio" class="custom-control-input stripe" >
                                <label class="custom-control-label" for="debit">Stripe</label>
                            </div> -->
                            <div class="col-12 d-flex shopping-box">
                                <button  type="submit" class="btn btn-primary" onclick="return selectPaymentMethod();" style="color:white;">Place Order</button> 
                            
                                
                        </div>
             </form>
                
			</div>
		</div>
	</section><!--/#do_action-->

<!-- End Cart -->
@endsection