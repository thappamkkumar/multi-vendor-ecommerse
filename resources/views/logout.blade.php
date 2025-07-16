<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shivam Electro Tools</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		
		<link href="{{asset('vender/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('vender/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"> 
		
		
		<link href="{{asset('vender/css/customer/navigation.css')}}" rel="stylesheet">
		<link href="{{asset('vender/css/color.css')}}" rel="stylesheet">  
		<link href="{{asset('vender/css/logout.css')}}" rel="stylesheet">
		<link href="{{asset('vender/css/login.css')}}" rel="stylesheet">
		<link href="{{asset('vender/css/customer/footer.css')}}" rel="stylesheet">
         
    </head>
	<body>
			
		<header class="container-fluid   d-flex align-items-center justify-content-between  " id="user_navigation_container">  
			 <!--<a href="{{route('userBack')}}" class="btn  p-0 px-2 text-dark border-0    user_naviagtion_controll_btn"     ><i class="bi bi-arrow-left fs-4 text-dark"></i></a>-->
			<button class="btn  p-0 px-2 text-dark border-0    user_naviagtion_controll_btn"    onclick="history.back()">
				<i class="bi bi-arrow-left fs-4 text-dark"></i>
			</button>
			
			<div class="logo_contaniner  ">
				<a href="{{route('home')}}"  class="logo  d-block text-nowrap"   >
					@if(!empty($webDetail)) {{$webDetail[0]->webSiteName}} @endif
				</a>	
			</div>
			 
			<div class="navbar  navbar-expand  w-auto    "> 
				<ul class="navbar-nav d-flex align-items-center justify-content-center  "  >
					@guest   
						<li class="nav-item"><a href="{{route('loginPage')}}"    class="nav-link    rounded " id="navigation_link_login"  >Login</a></li>
					@else
						<li class="nav-item pe-2"><a href="{{route('logoutPage')}}"  class="nav-link   d-none d-md-block py-1 px-2  rounded   " id="navigation_link_logout"     >Logout</a></li>
						 			
					@endguest

				</ul>
			</div>
			 
		</header> 
		<main class="home_container ">
			<section class="logout_container d-flex justify-content-center align-items-start">
				<div class="logout shadow-lg rounded px-4 py-4" >
					<h2>Logout</h2>
					<p>Click to confirm logout.</p>
					<a href="{{route('logout')}}" class="btn btn-dark float-end">OK</a>
				</div>
			</section>
			 
			  
		</main>
	@include('customer/footer')
		<script src="{{asset('vender/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
		<script src="{{asset('vender/js/customer/navigation.js')}}"></script>  
		
    </body>
</html>