<aside class="d-flex justify-content-center align-items-start d-none d-md-flex  "  >

	<!-- navigation for screen has with greater then 768px-->
	<div class="   " id="side_nav">
		<nav class="navbar   "  >
			<div class="w-100  py-4">
			
					<h3 class="navbar-logo text-center">Admin</h3> 
				
			 </div>
			<ul class="navbar-nav   w-100 p-2 pb-4"   > 
			
				<li class="nav-item py-1"><a href="{{route('admin.dashboard')}}" class="nav-link px-2 py-1   rounded admin_navigation_link  " id="navigation_link_dashboard"    >Dashboard</a></li>
				
				<li class="nav-item   py-1"><a href="{{route('admin.userList', ['user' => 'all'])}}"  class="nav-link  px-2 py-1 rounded   admin_navigation_link" id="navigation_link_users"    >Users</a></li>
				
				<li class="nav-item  py-1 "><a  href="{{route('admin.categoryList')}}"  class="nav-link px-2 py-1  rounded  admin_navigation_link" id="navigation_link_categories"    >Categories</a></li>
				
				<li class="nav-item   py-1 "><a href="{{route('admin.productList', ['filterType'=>'products', 'filterName'=>'all'])}}" class="nav-link px-2 py-1  rounded  admin_navigation_link" id="navigation_link_products"   >Products</a></li>
				<li class="nav-item    py-1"><a href="{{route('admin.orderList')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_orders"   >Orders</a></li>
				
				<li class="nav-item    py-1"><a href="{{route('admin.transectionList')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_transections"   >Transections</a></li>
				
				<li class="nav-item    py-1"><a href="{{route('admin.paymentList')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_payments"   >Payments</a></li>
				
				<li class="nav-item    py-1"><a href="{{route('admin.profile')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_profile1"   >Profile</a></li>
				 
			</ul>
		</nav> 
	</div>
	<div class="w-auto h-100 d-flex justify-content-center align-items-center  p-2 " >
		<button type="button" class=" fw-bold fs-3 side_nav_control_btn  "   id="side_nav_btn" onclick="side_nav_controll()"><i class="bi bi-chevron-compact-left" id="side_nav_btn_icon"></i></button></div>

	
	
	
	<script>
	function side_nav_controll()
	{
		let iconElement = document.getElementById('side_nav_btn_icon');
		  let sideNav = document.getElementById('side_nav');

		if (iconElement.classList.contains("bi-chevron-compact-right")) 
		{
		  iconElement.classList.remove("bi-chevron-compact-right");  
		  iconElement.classList.add("bi-chevron-compact-left");
			sideNav.style.width = "200px";		  
		}
		else
		{ 
			iconElement.classList.remove("bi-chevron-compact-left"); 
			iconElement.classList.add("bi-chevron-compact-right"); 
			sideNav.style.width = "0px";
		}
		 
	}
	</script>
</aside>

<aside class="d-flex justify-content-center align-items-center d-block d-md-none  ">

	<!-- navigation for screen has with less then 768px-->
	<div class="offcanvas   offcanvas-start   " id="sideNavBar" style="max-width:300px;">
		<div class="offcanvas-header w-100 d-flex flex-row-reverse">
			 
			<button type="button" class="btn  p-0 px-2 text-dark border-0  d-md-none user_naviagtion_controll_btn  " data-bs-dismiss="offcanvas" ><i class="bi bi-x-lg text-dark fw-bold fs-3 "></i></button>
		</div>
		<div class="offcanvas-body  ">
			<nav class="navbar     w-100">
				<ul class="navbar-nav   w-100 p-2 "   > 
				<li class="nav-item py-1"><a href="{{route('admin.dashboard')}}" class="nav-link px-2 py-1   rounded admin_navigation_link  " id="navigation_link_dashboard1"    >Dashboard</a></li>
				<li class="nav-item   py-1"><a href="{{route('admin.userList', ['user' => 'all'])}}"  class="nav-link  px-2 py-1 rounded   admin_navigation_link" id="navigation_link_users1"    >Users</a></li>
				<li class="nav-item  py-1 "><a  href="{{route('admin.categoryList')}}"  class="nav-link px-2 py-1  rounded  admin_navigation_link" id="navigation_link_categories1"    >Categories</a></li>
				<li class="nav-item   py-1 "><a href="{{route('admin.productList',['filterType'=>'products', 'filterName'=>'all'])}}" class="nav-link px-2 py-1  rounded  admin_navigation_link" id="navigation_link_products1"   >Products</a></li>
				<li class="nav-item    py-1"><a href="{{route('admin.orderList')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_orders1"   >Orders</a></li>
				<li class="nav-item    py-1"><a href="{{route('admin.transectionList')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_transections1"   >Transections</a></li>
				<li class="nav-item    py-1"><a href="{{route('admin.paymentList')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_payments1"   >Payments</a></li>
				<li class="nav-item    py-1"><a href="{{route('admin.profile')}}" class="nav-link px-2 py-1 rounded admin_navigation_link " id="navigation_link_profile2"   >Profile</a></li>
				 
			</ul>
			</nav> 
		</div>
	</div>

</aside>