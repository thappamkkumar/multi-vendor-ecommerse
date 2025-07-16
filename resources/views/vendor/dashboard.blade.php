@extends('vendor/layout')
@section('vendor.dashboard')
<section class="p-2">
	<script src="{{asset('vender/Highcharts/code/highcharts.js')}}"></script>  
	<h1 class="py-2 " data-aos="zoom-in"    data-aos-duration="1000">Dashboard</h1>
	<div class="row w-100 mx-auto py-2">
		 
		<div class=" col-12 col-sm-6 col-md-4 py-2">
			<div class=" w-100 h-auto py-3   dashboardCard"
				onclick="window.location.href =  `{{route('vendor.productList', ['filterType'=>'product', 'filterName'=>'all'])}}`;" data-aos="zoom-in" data-aos-duration="1000">
				<div class="py-2  d-flex  justify-content-center align-items-center  ">
					<span class="dashboardCard_icon_container">
					<i class="bi bi-tag-fill fs-3 p-0" ></i>
					</span>
				</div>
				<h3  class="pt-2 text-center">Product</h3>
				<h4  class="fw-bold text-center">{{$records_total['products']}}</h4>
			</div>
			
		</div>
		<div class=" col-12 col-sm-6 col-md-4 py-2">
			<div class=" w-100 h-auto py-3    dashboardCard"
				onclick="window.location.href =  `{{route('vendor.orderList')}}`;" data-aos="zoom-in" data-aos-duration="1000">
				<div class="py-2  d-flex  justify-content-center align-items-center  ">
					<span class="dashboardCard_icon_container">
					<i class="bi bi-cart-fill fs-3 p-0" ></i>
					</span>
				</div>
				<h3  class="pt-2 text-center">Orders</h3>
				<h4  class="fw-bold text-center">{{$records_total['orders']}}</h4>
			</div>
			
		</div>
		 
		<div class=" col-12 col-sm-6 col-md-4 py-2">
			<div class=" w-100 h-auto py-3    dashboardCard"
				onclick="window.location.href =  `{{route('vendor.paymentList')}}`;" data-aos="zoom-in" data-aos-duration="1000">
				<div class="py-2  d-flex  justify-content-center align-items-center  ">
					<span class="dashboardCard_icon_container">
					<i class="bi bi-credit-card-fill fs-3 p-0" ></i>
					</span>
				</div>
				<h3 class="pt-2 text-center">Payments</h3>
				<h4 class="fw-bold text-center">{{$records_total['payments']}}</h4>
			</div>
			
		</div>
		 
	</div>
	
	<!-- div for graphs-->
	
	<script src="{{asset('vender/js/admin/dashboard.js')}}"></script>
	
	<script> 
		const element1 = document.getElementById("navigation_link_dashboard"); 
		const element2 = document.getElementById("navigation_link_dashboard1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link");
		
	</script>
</section>
@endsection