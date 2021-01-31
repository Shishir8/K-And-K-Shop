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
    
    <!DOCTYPE html>
            <html>
            <title>HTML Tutorial</title>
            <style>
            body {
                font-family: 'Montserrat', sans-serif;
                
            }
            .change-password-modal {
                display: flex;
            flex-direction: column;
                padding: 100px;
                margin: 200px;
                margin-top: 10px;
                border-radius: 2px;
                border: 1px solid #ccc;
                margin-bottom: 10px;

            }
            .modal-header {
                font-size: 40px;
                font-weight: 600;
                margin-bottom: 2px;
                margin-top: -80px;
                color: #3C414F;
            }
            .modal-body {
                display: flex;
                justify-content: space-between;
                margin-bottom: 1px;
                
            }
            .modal-form-group {
                display: flex;
                flex-direction: column;
                margin-bottom: 20px;
                label {
                    color: #3C414F;
                    font-weight: 600;
                }
                input {
                    font-size: 16px;
                    padding: 10px 0px;
                margin-top: 10px;
                border: none;
                border-bottom: 1px solid #AAA;
                    outline: none;
                }
                .modal-hlp-txt {
                    font-size: 14px;
                }
            }
            .modal-form, .password-guidelines {
                width: 45%;
                
            }
            .password-guidelines {
                padding: 15px;
                border-radius: 2px;
                border: 1px solid #ccc;
                
            }
            .guidelines-header {
                color: #3C414F;
                font-size: 20px;
                font-weight: 600;
                padding-bottom: 15px;
                border-bottom: 1px solid #ccc;
                
            }
            .guidelines-sub-header {
                color: #3C414F;
                font-size: 16px;
                font-weight: 600;
                padding: 15px 0px;

            }
            .guidelines-description {
                p {
                    color: #7a7676;
                    margin-bottom: 5px;
                    &:last-child {
                        margin-bottom: 0px;
                    }
                }
            }
            .modal-footer {
                display: flex;
                justify-content: space-between;
                margin-bottom: -40px;

            }
            .modal-btn {
                min-width: 100px;
                font-size: 17px;
            padding: 8px;
            background: #fff;
            border: 1px solid purple;
            border-radius: 2px;
                margin-bottom: -60px;

            outline: none;
                &.primary-btn {
                    color: purple;
                }
                &.secondary-btn {
                    color: #fff;
                    background: purple;
                }
                &:hover {
                    cursor: pointer;
                }
            }
            </style>
            <body>


                    <div class="change-password-modal">
                        <h2 class="modal-header">Change Address</h2>
                        <form action="{{url('/change-address')}}" method="POST" id="contactForm registerForm"> {{csrf_field()}}
                     <div class="row">
                         
                         <div class="col-md-12">
                            <div class="form-group">
                            <label for="name">Name </label>
                                <input type="text" class="form-control" value="{{$userDetails->name}}" id="name" name="name" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Perment Address </label>
                                <input type="text" class="form-control" value="{{$userDetails->address}}" id="address" name="address" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="city">City </label>
                                <input type="text" class="form-control" value="{{$userDetails->city}}" id="city" name="city" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="state">State </label>
                                <input type="text" class="form-control" value="{{$userDetails->state}}" id="state" name="state" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="country">Country </label>
                               <select name="country" id="country" class="form-control">
                                   <option value="1">Select Country</option>
                                   @foreach($countries as $country)
                                   <option value="{{$country->country_name}}" @if($country->country_name == $userDetails->country) selected @endif>{{$country->country_name}}</option>
                                   @endforeach
                               </select>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pin">Pin Code </label>
                                <input type="text" class="form-control" value="{{$userDetails->pincode}}" id="pincode" name="pincode" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Phone number">Phone Number </label>
                                <input type="text" class="form-control" value="{{$userDetails->mobile}}" id="mobile" name="mobile" required data-error="Please Enter Your Password">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="modal-btn secondary-btn">Save Changes</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                     </div>
                 </form>
                    </div>

            </body>
    </html>


@endsection