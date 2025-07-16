@extends('vendor/layout')
@section('vendor.profile')
 
	<section class=" p-0 pt-2 p-md-4 h-auto  ">
		@include('vendor/profileUpdate')
		 
		<!-- start div for profile -->
		<div class=" mx-auto profile">
				@if($errors->any())
                    <div class=" w-100 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
							<h3>Errors</h3>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
					@include('alert_box')
				<div class="row  py-5 px-2 px-sm-5 "  >
					<!--start div for profile image-->
					<div class="col-12 col-lg-6    ">
						<div class="bg-white  shadow-lg p-4 w-100 h-100 rounded  d-flex justify-content-center align-items-center flex-column" >
							
							@guest 
								@php $user_profile_image=asset('images/profile_icon.png'); @endphp
							@else
								@php   
									$vendor = auth()->user()->vendors; 

									if ($vendor) {
											$user_profile_image = $vendor->brand_logo
													? url(Storage::url('user_profile/' . $vendor->brand_logo))
													: null;
									}
										 
									if(empty($user_profile_image) || $user_profile_image == "")
									{
										$user_profile_image = asset('images/profile_icon.png');
									}
								@endphp
							@endguest
							<img src="{{ $user_profile_image }}"  class=" shadow-none  rounded-circle"   alt="{{auth()->user()->vendors->name}} image"  onerror="this.onerror=null;this.src='{{ asset('images/profile_icon.png') }}';" style="max-width:300px; aspect-ratio:1/1;"  >
								 
							  
							
							<div class="d-flex flex-column justify-content-center align-items-center py-2">
								<h4 class="py-3"   >{{auth()->user()->vendors->name}}</h4>
								<a href="mailto:{{auth()->user()->email}}" class="text-decoration-none text-muted"   ><i class="bi bi-envelope  fw-bold"></i> <span class="text-muted">{{auth()->user()->email}}</span></a>
								<a href="tel:{{auth()->user()->mobile_number}}" class="text-decoration-none text-muted"   ><i class="bi bi-telephone  fw-bold"></i> <span class="text-muted">{{auth()->user()->mobile_number}}</span></a>
							</div>
							<div class="text-center d-flex flex-wrap"  >
								<form action="{{route('vendor.changeLogo')}}" id="changeLogoForm" method="POST" enctype="multipart/form-data">
									@csrf
									 <label class="btn btn-light mx-1" for="imageInputID"  style="color:rgba(var(--forest-green-color), 1);">Change Logo</label>
									 <input type="file" class="imageInput" id="imageInputID" name="image"  onchange="submitForm(event,'changeLogoForm')" >
									  
								</form>
								
								<button type="button" class="btn btn-light  mx-1"  data-bs-toggle="modal" data-bs-target="#changePasswordModel"  style="color:rgba(var(--forest-green-color), 1);">Change Password</button>
							</div>
						</div>
					</div>
					<!--end div for profile image-->
					<!--start div for profile details-->
					<div class="col-12 col-lg-6  py-3 py-lg-0">
						
						<div class="bg-white  rounded shadow-lg p-4  w-100 h-100  "  >
							<h3>Basic Details</h3>
							<table class="table  ">
								<tbody>
									<tr >
										<th class="w-50">Name</th><td class="w-50 bg-light">{{auth()->user()->vendors->name}}</td>
									</tr>
									<tr >
										<th class="w-50">Brand Name</th><td class="w-50 bg-light">{{auth()->user()->vendors->brand_name}}</td>
									</tr>
									<tr >
										<th class="w-50">GSTIN</th><td class="w-50 bg-light">{{auth()->user()->vendors->gstin}}</td>
									</tr>
									<tr >
										<th class="w-50">Country</th><td class="w-50 bg-light">{{auth()->user()->vendors->country}}</td>
									</tr>
									<tr >
										<th class="w-50">State</th><td class="w-50 bg-light">{{auth()->user()->vendors->state}}</td>
									</tr>
									<tr >
										<th class="w-50">City</th><td class="w-50 bg-light">{{auth()->user()->vendors->city}}</td>
									</tr>
									<tr >
										<th class="w-50">Pincode</th><td class="w-50 bg-light">{{auth()->user()->vendors->pincode}}</td>
									</tr>
									<tr >
										<th class="w-50">Landmark</th><td class="w-50 bg-light">{{auth()->user()->vendors->landmark}}</td>
									</tr>
									 
								</tbody>
							</table>
							<div class="py-2 ">
									 
									<button type="button" data-bs-toggle="modal" data-bs-target="#updateBasicDetailModel" class="btn btn-dark my-1" >Update Basic  Details</button>
							</div>
							
							
						</div>
					</div>
					<!--end div for profile details-->
					<!-- div for account details-->
					<div class="col-12  py-3    ">
						<div class="bg-white  rounded shadow-lg p-4  w-100 h-100  "  >
							<h3>Account Details</h3>
							<table class="table  ">
								<tbody>
									 
									<tr >
										<th class="w-50">Payment ID</th><td class="w-50 bg-light">{{auth()->user()->vendors->payment_id}}</td>
									</tr>
								</tbody>
							</table>
							<div class="py-2 ">
									 
									<button type="button"   data-bs-toggle="modal" data-bs-target="#updateAccountDetailModel"  class="btn btn-dark my-1" >Update Account Details </button>
							</div>
						</div>
					</div>
					<!-- div end for account details-->
				</div>
				
		</div>
		<!-- end div for profile -->
		
		 
	</section> 
	  
	<script src="{{asset('vender/js/admin/formSubmit.js')}}"></script>  
	<script>  
		const element1 = document.getElementById("navigation_link_profile_vendor"); 
		const element2 = document.getElementById("navigation_link_profile_vendor1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link");
			
	</script>
@endsection