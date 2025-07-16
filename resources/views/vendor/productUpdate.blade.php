@extends('vendor/layout')
@section('vendor.productUpdate')
<section class="p-0 pt-2 p-md-4 h-auto">
	<script src="{{asset('vender/tinymce_6/tinymce/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
		<script>tinymce.init({ 
											selector:'#product_description',
											height:'300px'											
											
										});
		</script>
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
	
	
	
	<div class="w-100 h-auto p-2 p-md-4 shadow rounded  "  >
		<div class="   border-bottom">
			<span class="fs-4 fw-bold">Product / </span> 
			<span class="fs-2 fw-bolder ps-1" style="color:rgba(var(--forest-green-color),1);">Update Product</span>
		</div> 
		<small class="d-block text-end py-1">[ Click on image to update ] </small>
		<!-- start of div for product thumnail-->
		<div class="py-3">
			<h4>Product Thumbnail </h4>
			
			<div class="d-flex flex-wrap align-items-center">
				<!-- form for update thumnail-->
				<form action="{{route('vendor.productThumnailUpdate')}}" id="vendorThumnailUpdate"  method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="product_id" value="{{$product->id}}"> 
					<label for="thumbnailInputID" class="  m-1 "  >
						<img src="{{ $product->thumnail }}"  alt="product thumbanil"	class="profile_image"  onerror="this.onerror=null;this.src='{{ asset('images/imageError.jpg') }}';"   > 
					</label>
					<input type="file" class="imageInput" id="thumbnailInputID" name="thumnail" 
					onchange="submitForm(event, 'vendorThumnailUpdate')" accept=".jpg, .jpeg, .png" >
				</form>
				<!-- end of form  -->
			</div>				 
		</div>
		<!-- end of div for product thumnail-->	
		
		
		<!-- start of div for product images-->
		<div class="py-3">
			<div class="d-flex flex-wrap justify-content-between align-items-center py-2 py-sm-0">
			<h4>Product Images</h4> 
				@if(!empty($product->images))
					<button type="button" class="btn btn-light "
						onclick='window.location.href =  `{{route("vendor.deleteProductAllImage", ["product" => $product])}}`;'>
						<i class="bi bi-trash fw-bold fs-5 "></i> All Images</button>
				@endif
			</div>
			
			<div class="d-flex flex-wrap align-items-center">
				
				@if(!empty($product->images))
				 
				@foreach($product->images as $index=>$image)
				<!-- form for update images-->
					<form action="{{route('vendor.productImagesUpdate')}}" id="vendorImagesUpdate{{$index + 1}}"  method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="product_id" value="{{$product->id}}"> 
						<input type="hidden" name="pre_image" value="{{$index + 1}}"> 
						<label for="imageInputID{{ $index + 1 }}" class="  m-1 "  >
							<img src="{{ $image }}"  alt="product image"	class="profile_image"  onerror="this.onerror=null;this.src='{{ asset('images/imageError.jpg') }}';"   > 
						</label>
						<input type="file" class="imageInput" id="imageInputID{{ $index + 1 }}" name="image" 	onchange="submitForm(event, 'vendorImagesUpdate{{ $index + 1 }}')" accept=".jpg, .jpeg, .png" >
					</form><!-- end of form  -->
					 
				@endforeach
					
				@endif
				
				@if(empty($product->images) || count($product->images) != 10)
					<!-- form for add images-->
					<form action="{{route('vendor.productImagesADD')}}" id="vendorImagesADD"  method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="product_id" value="{{$product->id}}"> 
						<label for="imageInputIDAdd" class=" btn m-1 " id="userVendorBtn" >
							 Add Images
						</label>
						<input type="file" class="imageInput" id="imageInputIDAdd" name="images[]"  
						onchange="submitForm(event, 'vendorImagesADD')" max="10"  multiple accept=".jpg, .jpeg, .png" >
					</form><!-- end of form  -->
					@endif
				
			</div>				 
		</div>
		<!-- end of div for product image-->	
		
		
		
		<!-- div for product basic daetails-->
		<div class="py-3">
			<!-- form for Update basic details-->
			<h4>Product Basic Details  </h4>
			<form action="{{route('vendor.productBasicDetailUpdate')}}"  method="post" >
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}"> 
				<div class="row w-100 mx-auto align-items-end  "> 
					<div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="name_id">Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control login_input" value="{{$product->name}}"  name="name" id="name_id" required="true" autocomplete="off"/>
					</div>
					
					<div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="slug_id">Slug <span class="text-danger">*</span></label>
						<input type="text" class="form-control login_input" value="{{$product->slug}}"  name="slug" id="slug_id" required="true" autocomplete="off"/>
					</div>
					 <div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="price_id">Price <span class="text-danger">*</span></label>
						<input type="number" class="form-control login_input" value="{{$product->price}}"  name="price" id="price_id" required="true" autocomplete="off"/>
					</div> 
					<div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="sale_price_id">Sale Price <span class="text-danger">*</span></label>
						<input type="number" class="form-control login_input" value="{{$product->sale_price}}"  name="sale_price" id="sale_price_id" required="true" autocomplete="off"/>
					</div>
					<div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="stock_id">Stock <span class="text-danger">*</span></label>
						<input type="number" class="form-control login_input" value="{{$product->stock}}"  name="stock" id="stock_id" required="true" autocomplete="off"/>
					</div> 
					<div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="delivery_charges_id">Delivery  Charges <span class="text-danger">*</span></label>
						<input type="number" class="form-control login_input" value="{{$product->delivery_charges}}"  name="delivery_charges" id="delivery_charges_id" required="true" autocomplete="off"/>
					</div> 
					<div class="col-12 col-sm-4 py-2">
						<label class="form-label   " for="category_id">Category <span class="text-danger">*</span></label>
						 
						<select name="categories_id" class="form-select login_input" id="category_id" required="true">
							<option value="" style="background-color:rgba(100,100,100,0.5);" readonly>Select Category</option>
							@foreach($categories as $category )
								<option  value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class=" col-12 col-sm-4 py-3">
						<button type="submit" class="btn   btn-dark">Update</button>
					</div>
				</div>		
			</form><!-- end of form  -->
		</div>
		<!-- div end for product basic daetails-->
		
		<!-- div for product description-->
		<div class="py-3">
			<h4 class="pb-3">Product Description </h4> 
			<!-- form for Update product Description-->
			<form action="{{route('vendor.productDescriptionUpdate')}}"  method="post" >
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}"> 
				
				<textarea class="form-control   " id="product_description"  name="description"  > {{$product->description}}</textarea>
				<div class="   py-3">
					<button type="submit" class="btn   btn-dark">Update</button>
				</div>
			</form><!-- end of form  -->		
		</div>
		<!-- div end for product description-->	
		
		
		<!-- div for product vedio url-->
		<div class="py-3">
			<h4 class="pb-3">Product Vedio Link </h4>
			<!-- form for Update product Vedio Link-->	
			<form action="{{route('vendor.productVedioUrlUpdate')}}"  method="post" >
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}">  
									
				<div class="row w-100 mx-auto align-items-end  "> 
					<div class="col-12 col-sm-6 col-md-8 col-lg-6 col-xl-4  ">
						<input type="text" class="form-control login_input" value="{{$product->video_url }}"  name="video_url" id="video_url_id" onchange="setURL(this.id,'video_link')" required="true" autocomplete="off"/>
					</div>	
					<div class=" col-4   ">
						<button type="submit" class="btn   btn-dark">Update</button>
					</div> 		
				</div>		
			</form><!-- end of form  -->	
		</div>
		<!-- div end for product vedio url-->
		<!-- div for product Specification-->
		<div class="py-3">
			<h4 class="pb-3">Product Specification </h4>
			<!-- form for Update product Specification-->	
			<form action="{{route('vendor.productSpecificationUpdate')}}"  method="post" >
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}">  
				<div class="row w-100 mx-auto align-items-end  "> 
					 
					@php 
						$specification_data = (count($product->specification) > 0) ? $product->specification : [];
						$total_data = count($specification_data);
					@endphp
					 
					<div class="col-12 pt-2">
						<div class="row" id="specification_container">
							@if($total_data > 0)
								@for($i=0,$j=1;$total_data>$i;$i=$i+2,$j++)
									<div class="col-12 py-2">
										<div class="row">
											<div class="col-12 col-sm-6 col-xl-4  ">
												<input type="text" class="form-control login_input" value="{{$specification_data[$i]}}" name="specification_heading_{{ $j }}" placeholder="Specification Name" autocomplete="off" required> 
											</div>
											<div class="col-12 col-sm-6 col-xl-4 py-2 py-sm-0">
												<input type="text" class="form-control login_input" value="{{$specification_data[$i+1]}}" name="specification_detail_{{ $j }}" placeholder="Specification Detail" autocomplete="off" required> 
											</div>
										</div>
									</div>
								@endfor
							@else
								<div class="col-12 py-2">
									<div class="row">
										<div class="col-12 col-sm-6 col-xl-4 ">
											<input type="text" class="form-control login_input" name="specification_heading_1" placeholder="Specification Name" autocomplete="off" required> 
										</div>
										<div class="col-12 col-sm-6 col-xl-4 py-2 py-sm-0">
											<input type="text" class="form-control login_input" name="specification_detail_1" placeholder="Specification Detail" autocomplete="off" required> 
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>

					<div class="col-12 pb-2"> 
						<input type="hidden" value="{{ $total_data > 0 ? $total_data/2 : 1 }}" name="total_specification" id="total_specification"> 
						<button type="button" class="btn btn-transparent text-primary" onclick="addSpecificationField()">Add Specification</button>						 
					</div> 
				</div> 
				<div class="  py-3   ">
					<button type="submit" class="btn   btn-dark">Update</button>
				</div> 
				
			</form><!-- end of form  -->	
		</div>
		<!-- div end for product specification-->
	</div>
	
	 
	 
	 <!-- JavaScript -->
	 <script src="{{asset('vender/js/admin/formSubmit.js')}}"></script> 
	 <script src="{{asset('vender/js/vendor/addProduct.js')}}"></script> 
	 <script> 
		const element1 = document.getElementById("navigation_link_products"); 
		const element2 = document.getElementById("navigation_link_products1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link");
		
		</script>
	 
</section>
@endsection
