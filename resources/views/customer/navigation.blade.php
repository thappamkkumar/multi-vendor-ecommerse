 
	@guest 
		@php $user_profile_image=asset('images/profile_icon.png'); @endphp
	@else
		@php   
			$customer = auth()->user()->customers;

			if ($customer) {
					$user_profile_image = $customer->profile_image
							? url(Storage::url('user_profile/' . $customer->profile_image))
							: null;
			}
				 
			if(empty($user_profile_image) || $user_profile_image == "")
			{
				$user_profile_image = asset('images/profile_icon.png');
			}
		@endphp
	@endguest
	
<header class="container-fluid px-1 px-sm-2 px-md-3   d-flex align-items-center justify-content-between   " id="user_navigation_container" >  
	
	<button type="button" class="btn  p-0 px-1 px-sm-2 text-dark border-0  d-lg-none user_naviagtion_controll_btn " data-bs-toggle="offcanvas" data-bs-target="#sideNavBar" ><i class="bi bi-list text-dark fw-bold fs-3 "></i></button>
	
	<div class="logo_contaniner  ">
		<a href="{{route('home')}}"  class="logo  d-block text-nowrap"    >
			@if(!empty($webDetail)) {{$webDetail[0]->webSiteName}} @endif
		</a>
	</div>
	<nav class="navbar   navbar-expand d-none d-lg-flex  " >
		<ul class="navbar-nav align-items-center mx-auto  "   > 
			<li class="nav-item  px-1 py-1"><a href="{{route('home')}}" class="nav-link rounded  navigation_link  " id="navigation_link_home">Home</a></li>
			<li class="nav-item px-1 py-1"><a href="{{route('productListForUser')}}" class="nav-link rounded  navigation_link  " id="navigation_link_products" >Products</a></li>
			 
			<li class="nav-item px-1 py-1"><a href="{{route('categoriesListForUser')}}" class="nav-link rounded  navigation_link  " id="navigation_link_categories"   >Categories</a></li>
			<li class="nav-item px-1 py-1"><a href="{{route('userCartList')}}" class="nav-link rounded  navigation_link  " id="navigation_link_carts"     >Carts</a></li>
			<li class="nav-item px-1 py-1"><a href="{{route('userOrderList')}}" class="nav-link  rounded navigation_link  " id="navigation_link_orders"  >Orders</a></li>
		</ul>
	</nav> 
	<div class="navbar  navbar-expand  w-auto    "> 
		<ul class="navbar-nav d-flex align-items-center justify-content-center  "  >
			@guest   
				<li class="nav-item"><a href="{{route('loginPage')}}"    class="nav-link    rounded " id="navigation_link_login"   >Login</a></li>
			@else
				<li class="nav-item pe-2"><a href="{{route('logoutPage')}}"  class="nav-link   d-none d-lg-block py-1 px-2  rounded   " id="navigation_link_logout"   >Logout</a></li>
				<li class="nav-item"><a href="{{route('userProfile')}}"  class="nav-link   " id="navigation_link_profile"      ><img src="{{$user_profile_image}}" class=" rounded-pill nav_profile_img    "   onerror="this.onerror=null;this.src='{{ asset('images/profile_icon.png') }}';"     ></a></li>
							
			@endguest

		</ul>
		 
	</div>
	
	<div class="offcanvas   offcanvas-start   " id="sideNavBar"  style="max-width:300px;">
		<div class="offcanvas-header w-100 d-flex flex-row-reverse">
			 
						<button type="button" class="btn  p-0 px-2 text-dark border-0    user_naviagtion_controll_btn  " data-bs-dismiss="offcanvas"  ><i class="bi bi-x-lg text-dark fw-bold fs-3 "></i></button>

		</div>
		<div class="offcanvas-body px-2 ">
			<nav class="navbar     w-100">
				<ul class="navbar-nav   w-100 p-0  "   > 
					<li class="nav-item py-1"><a href="{{route('home')}}" class="nav-link px-2 py-1   rounded-1 navigation_link2  " id="navigation_link_home1"   >Home</a></li>
					<li class="nav-item   py-1"><a href="{{route('productListForUser')}}"  class="nav-link  px-2 py-1 rounded-1   navigation_link2" id="navigation_link_products1"  >Products</a></li>
					<li class="nav-item  py-1 "><a  href="{{route('categoriesListForUser')}}"  class="nav-link px-2 py-1  rounded-1  navigation_link2" id="navigation_link_categories1" >Categories</a></li>
					<li class="nav-item   py-1 "><a href="{{route('userCartList')}}" class="nav-link px-2 py-1  rounded-1  navigation_link2" id="navigation_link_carts1"  >Carts</a></li>
					<li class="nav-item    py-1"><a href="{{route('userOrderList')}}" class="nav-link px-2 py-1 rounded-1 navigation_link2 " id="navigation_link_orders1"   >Orders</a></li>
					@auth
						<li class="nav-item   py-1"><a href="{{route('logoutPage')}}"  class="nav-link  px-2 py-1 rounded-1  navigation_link2  " id="navigation_link_logout2"    >Logout</a></li>
					@endauth
				</ul>
			</nav> 
		</div>
	</div>
	 
</header>