@extends('admin/layout')
@section('admin.categoryList')
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
	 
	<div class="w-100 h-auto p-1 p-md-4 shadow rounded ">
		
		<h3 class="py-2 " >Category List</h3>
			
		
		<div class="py-2 px-2 d-flex flex-wrap justify-content-between align-items-center  table_header " style="--bs-bg-opacity:0.3;">
			<div>
				<i class="bi bi-table"></i>
				<span class="px-2">Showing={{$categories->count()}}, Total={{$categories->total()}} Categories, Page={{ $categories->currentPage()}}@if( $categories->total() >1 ) / {{ ceil($categories->total()/10) }} @endif</span>
			</div>
			<!-- Container for customer and vendor list btn-->
			<div class="py-2">
				
				<button type="button" class="btn px-1 py-0" id="userCustomerBtn" 
					data-bs-toggle="collapse" data-bs-target="#add_container"><i class="bi bi-plus fw-bolder fs-4 "></i></button>
			</div>
		</div>
		
		<!-- add section / div container for adding new users-->
		@include('admin/addNewCategory')
		<!-- Table for users List-->
		 <table class="table table-borderless   table_data">
			<thead>
				<tr>
					<th class="col-1">S No.</th>
					<th>Name</th>
					<th>Slug</th>
					<th class="col-2">GST</th>
					<th class="col-2">Products</th> 
					<th class="col-1">More</th>
				</tr>
			</thead>
			<tbody>
				@php $s_no = 1; @endphp
				@foreach($categories as $category)
					<tr class="text-danger">
						<td class="col-1 @if($category->is_active == 0)text-danger @endif ">{{$s_no++}}</td>
						<td class=" @if($category->is_active == 0)text-danger @endif "> {{$category->name}} </td>
						<td class=" @if($category->is_active == 0)text-danger @endif ">{{$category->slug}}</td>
						<td class="col-2 @if($category->is_active == 0)text-danger @endif ">{{$category->gst}}</td>
						<td class="col-2 @if($category->is_active == 0)text-danger @endif ">{{$category->products->count()}}</td>
						<td class="col-1  ">
							<button type="button" class="btn @if($category->is_active == 0)text-danger @endif"
							onclick='window.location.href =  `{{route("admin.categoryDetail", ["category" => $category])}}`;'>
							<i class="bi bi-chevron-compact-right "></i></button>
						</td>
					</tr>
				@endforeach
			</tbody>
			 
		 </table> 
		
		<!-- Pagination buttons -->
		@if($categories->total() > 10)
			<div class="w-100 py-4 "     >
			
				<ul class="pagination  justify-content-center">
					@if($categories->onFirstPage())
						<li class="page-item"><span class="btn   border border-2 me-1 ">Prev</span></li>
					@else 
						<li class="page-item"><a href="{{$categories->previousPageUrl()}}"
							class="   btn  paginateBTN border border-2 me-1">Prev</a></li>
					@endif
					@if($categories->hasMorePages())
						<li class="page-item"><a href="{{$categories->nextPageUrl()}}" 
						class=" btn  paginateBTN border border-2 ms-1">Next</a></li>
					 @else
						 <li class="page-item"><span class="   btn border border-2 ms-1">Next</span></li> 
					@endif
				</ul>
			</div>
		@endif
	</div>
	
	 
	<script> 
		const element1 = document.getElementById("navigation_link_categories"); 
		const element2 = document.getElementById("navigation_link_categories1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link"); 
	</script>
	 
</section>
@endsection
