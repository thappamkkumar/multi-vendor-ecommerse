@extends('vendor/layout')
@section('vendor.categoriesList')
<section class="p-0 pt-2 p-md-4 h-auto">
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
	
	 <!-- using Modal for add new category  -->
	<div class="modal fade" id="newCategoryModal" tabindex="-1" aria-labelledby="newCategoryModal" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="categoryModalLabel">Select Category</h5>
			<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
				<i class="bi bi-x-lg  fw-bolder fs-5 "></i>
			</button>
		  </div>
		  <div class="modal-body">
			<ol class="list-group">
			  @foreach($allCategories as $category)
				<li class="list-group-item p-0">
					<button type="button" class="btn  w-100 d-block text-start btn-light rounded-0  "
						onclick='window.location.href =  `{{route("vendor.addCategory", ["category" => $category])}}`;'>
						{{ $category->name }} 
					</button>
				</li>	
			  @endforeach
			</ol>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	 <!-- end of Modal for add new category -->
	 
	 
	<div class="w-100 h-auto p-1 p-md-4 rounded shadow   "  >
		 
		<div class="w-100  ">
		 	<h3 class="py-2 "  >Category List</h3>
			 
		</div>
		
		<div class="py-2 px-2 d-flex gap-2 flex-wrap justify-content-between align-items-center  table_header " style="--bs-bg-opacity:0.3;">
			<div>
				<i class="bi bi-table"></i>
				<span class="px-2">Showing={{$categories->count()}}, Total={{$categories->total()}} categories, Page={{ $categories->currentPage()}}@if( $categories->total() >1 ) / {{ ceil($categories->total()/10) }} @endif</span>
			</div>
			  
			<div >
				 
				<!-- button for  add new category  -->
				<button type="button" class="btn  px-1 py-0" data-bs-toggle="modal" data-bs-target="#newCategoryModal" id="addUserBTN">
				 <i class="bi bi-plus fw-bolder fs-4 "></i>
				</button>
				 
			</div>
			 
		</div>
		  
		<!-- Table for category List-->
		 <table class="table table-borderless   table_data">
			<thead>
				<tr>
					<th class="col-1">S No.</th>
					<th>Name</th>
					<th>GST</th>
					<th>Products</th>
					<th>Action</th>
					 
				</tr>
			</thead>
			<tbody>
				@php $s_no = 1; @endphp
				@foreach($categories as $category)
				 
					<tr class="text-danger">
						<td class="col-1  ">{{$s_no++}}</td>
						<td > {{$category->name}} </td> 
						<td > {{$category->gst}} </td> 
						<td > {{$category->product_count}} </td> 
						<td > 
							<button type="button" class=" btn   "
								onclick='window.location.href =  `{{route("vendor.removeCategory", ["category" => $category])}}`;'>
								Remove</button>
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