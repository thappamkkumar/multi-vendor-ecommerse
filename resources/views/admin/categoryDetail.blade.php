@extends('admin/layout')
@section('admin.categoryDetail')
<section class="p-0 pt-2 p-md-4 h-auto">
	<div class="pb-3 px-2 px-md-0"  >
		<!--<a href="{{route('userBack')}}"
				class="btn btn-light fs-6" ><i class="bi bi-arrow-left pe-2"></i>Back</a>-->
			<button class="btn btn-light fs-6 "   onclick="history.back()">
				<i class="bi bi-arrow-left   pe-2"></i>Back
			</button> 
	</div>
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
	<div class="w-100 h-auto p-2 p-md-4 shadow rounded  " >
		 <div class="    w-100 mx-auto">
		  
			<div class="   border-bottom">
				<span class="fs-4 fw-bold">Category / </span>
				<span class="fs-2 fw-bolder ps-1" style="color:rgba(var(--forest-green-color),1);">Detail</span>
			</div>
			<div class="py-3">
				<!-- button for deactivate and active the category-->
				
					<button type="button" class="btn m-1 " id="userVendorBtn"
						onclick='window.location.href =  `{{route("admin.categoryDeactive", ["category" => $category])}}`;'>
						@if($category->is_active == 1)De-activate Category @else Activate Category @endif</button>
						<!-- Button for product list that have selected category-->
				@if($category->products->count() > 0)
					<button type="button" class="btn m-1 " id="userCustomerBtn"
					onclick='window.location.href =  `{{route("admin.productList", ["filterType" => "category", "filterName" => $category->id])}}`;'
					>Products</button>
				@endif
			</div>
			<div class="">
				<form action="{{route('admin.categoryDetailUpdate')}}" method="POST">
					@csrf
					<input type="hidden" value="{{$category->id}}" name="category_id" style="visibility:hidden" />
					
					<div class="row w-100 mx-auto  align-items-end">
						<div class="col-12 col-sm-6 ">
							<div class="form-group">
								<label class="form-label   pt-3" for="name_id">Name 
									<span class="text-danger">*</span></label>
								<input type="text" class="form-control login_input"  name="name" id="name_id"  	value="{{$category->name}}"   autocomplete="off"/>
							</div>
						</div>
						<div class="col-12 col-sm-6 ">
							<div class="form-group">
								<label class="form-label   pt-3" for="gst_id">GST	<span class="text-danger">*</span></label>
								<input type="text" class="form-control login_input" name="gst" 	id="gst_id"    value="{{$category->gst}}"   autocomplete="off"/>
							</div>
						 
						</div>
						 
						<div class="col-12 col-sm-6 ">
							<div class="form-group">
								<label class="form-label   pt-3" for="slug_id">Slug<span class="text-danger">*</span></label>
								 
								<input type="text" class="form-control login_input" name="slug" id="slug_id"  value="{{$category->slug}}"   autocomplete="off"/> 
							</div>
						</div>
						 
							
						 
						<div class="col-12   col-sm-6 item-align-bottom">
							 <button type="submit" class="btn btn-dark w-100">Update</button>
						</div> 
					</div> 
				</form>
			</div>
				 
				 
		</div>		
			
		  
	</div>
	<script src="{{asset('vender/js/admin/formSubmit.js')}}"></script> 
	<script> 
		const element1 = document.getElementById("navigation_link_categories"); 
		const element2 = document.getElementById("navigation_link_categories1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link"); 
	</script>
	 
</section>
@endsection
