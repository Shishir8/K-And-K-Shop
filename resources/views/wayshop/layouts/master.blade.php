<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <!-- {{asset('front_assets/  ')}} -->
    <link href="{{asset('front_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('front_assets/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('front_assets/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <!-- {{asset('front_assets/  ')}} -->
    <link rel="shortcut icon" href="{{asset('front_assets/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front_assets/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('front_assets/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('front_assets/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('front_assets/images/ico/apple-touch-icon-57-precomposed.png')}}">
    
</head><!--/head-->

<body>

@include('wayshop.layouts.header')
@yield('content')
@include('wayshop.layouts.footer')
<script src="{{asset('front_assets/js/jquery.js')}}"></script>
	<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('front_assets/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('front_assets/js/price-range.js')}}"></script>
    <script src="{{asset('front_assets/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('front_assets/js/main.js')}}"></script>
<script>
    $(document).ready(function(){
      $("#selSize").change(function(){
    <!-- alert("test"); -->
       var idSize = $(this).val();
       if(idSize==""){
           return false;
       }
       $.ajax({
           type : 'get',
           url : '/get-product-price',
           data : {idSize:idSize},
           success:function(resp){
            <!-- alert(resp); -->
            var arr= resp.split('#');
            $("#getPrice").html("Product Price : PKR "+arr[0]);
            $('#price').val(arr[0]);
           },error:function(){
               alert("Error");
           }
         });
      });
    
      $("#billtoship").click(function(){
      if(this.checked){
        $("#shipping_name").val($("#billing_name").val());
        $("#shipping_address").val($("#billing_address").val());
        $("#shipping_city").val($("#billing_city").val());
        $("#shipping_state").val($("#billing_state").val());
        $("#shipping_country").val($("#billing_country").val());
        $("#shipping_pincode").val($("#billing_pincode").val());
        $("#shipping_mobile").val($("#billing_mobile").val());
      }else{
        $("#shipping_name").val('');
        $("#shipping_address").val('');
        $("#shipping_city").val('');
        $("#shipping_state").val('');
        $("#shipping_country").val('');
        $("#shipping_pincode").val('');
        $("#shipping_mobile").val('');
      }

    });
    });
    function selectPaymentMethod(){
      if($('.stripe').is(':checked') || $('.cod').is(':checked')){
        // alert('checked');
      }else{
        alert('Please Select Payment Method');
        return false;
      }
    }
    </script>
</body>

</html>