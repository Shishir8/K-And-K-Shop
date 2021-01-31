@extends('wayshop.layouts.master')
@section('content')

<div class="contact-box-main">
		<div class="container">
        @if(Session::has('flash_message_error'))
               <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                  </button>
               <strong>{{ session('flash_message_error') }}</strong>
               </div>
               @endif
               @if(Session::has('flash_message_success'))
               <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                  </button>
               <strong>{{ session('flash_message_success') }}</strong>
               </div>
           @endif
           
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Already a Member ? Just SignIn !</h2>
                        <form action="{{url('/user-login')}}" method="post" id="contactForm LoginForm"> {{csrf_field()}}
                        
                            <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required data-error="Please Enter Your Email">
                            <div class="help-block with-errors"></div>

                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-error="Please Enter Your Password">
                            <div class="help-block with-errors"></div>
							<button type="submit" class="btn btn-default">Login</button>
                        </form>
                        
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
                        <form action="{{url('/user-register')}}" method="POST" id="contactForm registerForm"> {{csrf_field()}}
                        <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required data-error="Please Enter Your Name">
                                 <div class="help-block with-errors"></div>
                                 <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-error="Please Enter Your Password">
                                <div class="help-block with-errors"></div>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	
	
	

@endsection