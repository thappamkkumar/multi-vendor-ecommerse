@extends('customer/layout')
@section('home')
<main class="home_container ">
	
	@include('customer/searchBar') 
	<!-- Section 1 Start-->
	
	<!-- Section for containing some degin for home or home container section 1 -->
	<section class="home_container_1 py-lg-5  "  >
		<div class="row w-100 mx-auto flex-row-reverse align-items-center ">
			<div class="col-12 col-lg-6 pt-5   pt-lg-0">
				 
					<img src="{{url('images/hero1.svg')}}" alt="product image" class="d-block    home_container_1_image" >
				 
			</div>
			<div class="col-12 col-lg-6  d-flex flex-column justify-content-center align-items-center ">
				<div class="  px-3 py-4  " >
					<h2 class="home_auto_text py-3" id="head_type_text"  >All Type Of Products Are Available Under Best Price.</h2>
					<h4 class="  fw-normal py-2 "  ><span    style="opacity:0.7;">SALE UPTO </span><span class="text-danger fw-bold fs-1 ">  50%  </span><span  style="opacity:0.7;"> OFF.</span></h4>
					<a  href="{{route('productListForUser')}}" class="btn w-100 d-lg-none home_shop_now_btn ">SHOP NOW</a>
					<a  href="{{route('productListForUser')}}" class="btn d-none d-lg-inline-block home_shop_now_btn " >SHOP NOW</a>
				</div>
				 
			</div>
			
		</div>
	</section>
	<!-- Section 1 End-->
	
	<!-- Section 2 Start-->
	<!-- Section for category -->
<!--	<section class="home_section">
		<div class="row w-100 mx-auto py-5 ">
			<div class="col-12 col-sm-4 col-xl-3  ">
				<div class="home_category_container">
					<ul class="list-group " data-aos="zoom-in"    data-aos-duration="1000">
						<li class="list-group-item p-0  ">
							<h3 class="p-2  ">Top Categories</h3>
						</li>
						
						
						
					</ul>
				</div>
			</div>
			
			
		</div>
	</section>-->
	 <!-- Section 2 End-->
	 
	<!-- Section 3 Start-->
	<!-- Section for Special Offers -->
	<section class="home_section py-5">
		<h1 class="text-center " >Special Offer</h1>
			<div class="row justify-content-center align-items-stretch   mx-auto py-5  " style="width:100; max-width:1400px">
			
				@foreach($specialOffers as $specialOffer)
					@include('customer/product_card', ['product' => $specialOffer])
				@endforeach
			</div>
	</section>
	<!-- Section 3 End-->
	 
	<!-- Section 4 Start-->
	<!-- Section for Features Offers -->
	<section class="home_section py-5">
		<h1 class="text-center " >Features Offer</h1>
			<div class="row justify-content-center align-items-stretch   mx-auto py-5  " style="width:100; max-width:1400px">
			
				@foreach($products as $product)
					@include('customer/product_card', ['product' => $product])
				@endforeach
			</div>
	</section>
	<!-- Section 4 End-->
	 
	 
	
	<!--<script src="{{asset('vender/js/customer/homeText.js')}}"></script>  -->
	<script>
		const element1 = document.getElementById("navigation_link_home"); 
		const element2 = document.getElementById("navigation_link_home1"); 
		element1.classList.add("active_navigation_link");
		element2.classList.add("active_navigation_link");
			
	</script>
</main>
@endsection