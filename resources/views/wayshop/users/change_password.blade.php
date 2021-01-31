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
     
    </div>

</div>



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
                <h2 class="modal-header">Change Password</h2>
                <section class="modal-body">
                        <form action="{{url('/change-password')}}" method="POST" id="contactForm registerForm"> {{csrf_field()}}

                        <div class="modal-form-group">
                                    <input type="hidden" class="form-control" placeholder="Old Password" id="old_pwd" name="old_pwd" required data-error="Please Enter Your Email">
                        </div>
                        <div class="modal-form-group">
                                    <label for="password">Password </label>
                                    <input type="password" class="form-control" placeholder="Old Password" id="current_password" name="current_password" required data-error="Please Enter Your Email">
                        </div>
                        <div class="modal-form-group">
                                    <label for="confirm-password">Confirm Password </label>
                                    <input type="password" class="form-control" placeholder="New Password" id="new_pwd" name="new_pwd" required data-error="Please Enter Your Password">
                        </div>
                        <div class="modal-form-group">
                            <button class="modal-btn secondary-btn">Save Changes</button>

                        </div>
                    </form>
                    <div class="password-guidelines">
                        <h3 class="guidelines-header">Password Guidelines</h3>
                        <h4 class="guidelines-sub-header">Eg: MY@password123</h4>
                        <div class="guidelines-description">
                            <p>Must be 6 - 15 character</p><p>Must be 6 - 15 character</p>
                            <p>Must be 6 - 15 character</p>
                            <p>Must be 6 - 15 character</p>
                            <p>Must be 6 - 15 character</p>
                        </div>
                    </div>
                </section>
                <div class="modal-footer">
                    <a href="{{url('/account')}}"><button class="modal-btn primary-btn">Back</button></a>
                </div>
            </div>



            </body>
            </html>

@endsection