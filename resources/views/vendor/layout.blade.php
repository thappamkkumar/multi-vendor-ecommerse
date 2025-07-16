<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>@if(!empty($webDetail)) {{$webDetail[0]->webSiteName}} @endif</title>

			<!-- Fonts -->
			<link rel="preconnect" href="https://fonts.bunny.net">
			<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		
			<link href="{{asset('vender/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
			<link href="{{asset('vender/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">   
			
			<link href="{{asset('vender/css/admin/navigation.css')}}" rel="stylesheet">
			<link href="{{asset('vender/css/admin/dashboard.css')}}" rel="stylesheet">
			<link href="{{asset('vender/css/admin/table.css')}}" rel="stylesheet">
			<link href="{{asset('vender/css/admin/user_profile.css')}}" rel="stylesheet">
			
			<link href="{{asset('vender/css/vendor/table.css')}}" rel="stylesheet">
			<link href="{{asset('vender/css/vendor/navigation.css')}}" rel="stylesheet">
			
			<link href="{{asset('vender/css/customer/navigation.css')}}" rel="stylesheet"> 
			<link href="{{asset('vender/css/color.css')}}" rel="stylesheet">
			<link href="{{asset('vender/css/login.css')}}" rel="stylesheet">
			<link href="{{asset('vender/css/logout.css')}}" rel="stylesheet"> 
			<link href="{{asset('vender/css/preLoading.css')}}" rel="stylesheet">
        
		
  </head>
  <body>
		@include('loader/preLoading')
		<div class="d-flex   justify-content-center  container_body">
			@include('vendor/sideNav/navigation')
			<main class="w-100   ">
			
				@include('vendor/header/header')
				@yield('vendor.dashboard')  
				
				<!-- Products -->
				@yield('vendor.productList')  
				@yield('vendor.productSearch') 
				@yield('vendor.productDetail') 
				@yield('vendor.addProduct') 
				@yield('vendor.productUpdate') 
				
				<!-- Order-->
				@yield('vendor.orderList') 
				@yield('vendor.orderDetail') 
				
				<!-- Payments -->
				
				@yield('vendor.paymentList') 
				
				<!-- Profile-->
				@yield('vendor.profile') 
				
				<!-- categories -->
				@yield('vendor.categoriesList')
				
				@yield('logout') 
			</div>
		</div>
	  
		
		  
		
		<script src="{{asset('vender/bootstrap/js/bootstrap.bundle.min.js')}}"></script>  
		<script src="{{asset('vender/js/preloader.js')}}"></script>    
		
  </body>
</html>