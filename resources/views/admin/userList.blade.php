@extends('admin/layout')
@section('admin.userList')
<section class="p-0 pt-2 p-md-4 h-auto parent_add_container" >
	@if($errors->any())
		<div class="   alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="btn-close float-end  " data-bs-dismiss="alert" aria-label="Close"></button>
			<h3>Errors</h3>
			<ul>
				@foreach($errors->all() as $error)
					<li> {{ $error }} </li>
				@endforeach
			</ul>
		</div>
	@endif 
	@include('alert_box')
	<!-- navigate under the user -->
	@if($role == "vendors")
		<div class="pb-3 px-2 px-md-0">
			<a href='{{route("admin.userList", ["user" => "all"])}}'
				class="text-decoration-none fs-4" >User</a> 
			<span class="fs-3 fw-normal px-2">/</span><span class="fs-2 fw-bold">Seller</span>
		</div>
	  
	@elseif($role == "customers")
		<div class="pb-3 px-2 px-md-0" >
			<a href='{{route("admin.userList", ["user" => "all"])}}'
				class="text-decoration-none fs-4" >User</a>
			<span class="fs-3 fw-normal px-2">/</span><span class="fs-2 fw-bold">Customer</span>
		</div>
		  
	@else
	   
	@endif
	 
	<div class="w-100 h-auto p-1 p-md-4 shadow rounded">
		<div class="w-100 d-flex flex-wrap justify-content-between align-items-center ">
		<!-- heading for list according selected user role-->
			@if($role == "vendors")
				<h4  >Seller List</h4>
			@elseif($role == "customers")
				<h4 >Customer List</h4>
			@else
				<h3 class="py-2 " >User List</h3>
			@endif
			<div  >
				<!-- Form for search users -->
				<form action="{{route('admin.userSearch')}}" method="POST">
					@csrf
					<div class="input-group-text flex-wrap  align-items-center   bg-transparent border-0">
						<input type="search" name="userSearchInput" placeholder="Search user" 
							class="form-control   searchInput"  autocomplete="off"/>
						<button type="submit" class="btn      searchBTN">
							<i class="bi bi-search fs-3"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Container for data about table abd also it contain container of customer and vendor-->
		<div class="py-2 px-2 d-flex flex-wrap justify-content-between align-items-center  table_header " style="--bs-bg-opacity:0.3;">
			<div>
				<i class="bi bi-table"></i>
				<span class="px-2">Showing={{$users->count()}}, Total={{$users->total()}} Users, Page={{ $users->currentPage()}}@if( $users->total() >1 ) / {{ ceil($users->total()/10) }} @endif</span>
			</div>
			<!-- Container for customer and vendor list btn-->
			<div class="py-2">
				<!-- Button  for customer list-->
				<button type="button" class="btn " id="userCustomerBtn"
					onclick='window.location.href =  `{{route("admin.userList", ["user" => "customers"])}}`;'  >
					Customers</button>
				
				<!-- Button  for vendor list-->
				<button type="button" class="btn" id="userVendorBtn"
				onclick='window.location.href =  `{{route("admin.userList", ["user" => "vendors"])}}`;' >
				Sellers</button>
				<!-- button for add new user-->
				<button type="button" class="btn px-1 py-0" id="addUserBTN" 
					data-bs-toggle="collapse" data-bs-target="#add_container"><i class="bi bi-plus fw-bolder fs-4 "></i></button>
			</div>
		</div>
		
		<!-- add section / div container for adding new users-->
		@include('admin/addNewUser')
		<!-- Table for users List-->
		 <table class="table table-borderless   table_data">
			<thead>
				<tr>
					<th class="col-1">S No.</th>
					<th>Name</th>
					<th>Email</th>
					<th class="col-2">User Role</th>
					<th class="col-1">More</th>
				</tr>
			</thead>
			<tbody>
				@php $s_no = 1; @endphp
				@foreach($users as $user)
					<tr   >
						<td class="col-1 @if($user->is_active == 0)text-danger @endif">{{$s_no++}}</td>
						<td class="@if($user->is_active == 0)text-danger @endif">
							@if($user->user_role == 3){{$user->customers->name}} @else {{$user->vendors->name}} @endif
						</td>
						<td class="@if($user->is_active == 0)text-danger @endif">{{$user->email}}</td>
						<td class="col-2 @if($user->is_active == 0)text-danger @endif">
							@if($user->user_role == 3)Customer @else Seller @endif
						</td>
						<td class="col-1">
							<button type="button" class="btn @if($user->is_active == 0)text-danger @endif"
							onclick='window.location.href =  `{{route("admin.userProfile", ["user" => $user])}}`;'>
							<i class="bi bi-chevron-compact-right "></i></button>
						</td>
					</tr>
				@endforeach
			</tbody>
			 
		 </table> 
		
		<!-- Pagination buttons -->
		@if($users->total() > 10)
			<div class="w-100 py-4 "     >
			
				<ul class="pagination  justify-content-center">
					@if($users->onFirstPage())
						<li class="page-item"><span class="btn   border border-2 me-1 ">Prev</span></li>
					@else 
						<li class="page-item"><a href="{{$users->previousPageUrl()}}"
							class="   btn  paginateBTN border border-2 me-1">Prev</a></li>
					@endif
					@if($users->hasMorePages())
						<li class="page-item"><a href="{{$users->nextPageUrl()}}" 
						class=" btn  paginateBTN border border-2 ms-1">Next</a></li>
					 @else
						 <li class="page-item"><span class="   btn border border-2 ms-1">Next</span></li> 
					@endif
				</ul>
			</div>
		@endif
	</div>
	
	
	<script> 
		const element1 = document.getElementById("navigation_link_users"); 
		const element2 = document.getElementById("navigation_link_users1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link"); 
	</script>
	 
</section>
@endsection
