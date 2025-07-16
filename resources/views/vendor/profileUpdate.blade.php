<!-- model/ div for password update/change-->
<div class="modal fade" id="changePasswordModel" tabindex="-1" aria-labelledby="changePasswordModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" id="productImageLabel"> Change Password</h4>
		<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
			<i class="bi bi-x-lg  fw-bolder fs-5 "></i>
		</button>
	  </div>
	  <div class="modal-body">
		 
		<form action="{{route('vendor.changePassword')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<label class="form-label pt-2" for="password">Current Password</label>
			<div class="login_input_container">
				<input type="password" name="password" id="password"  class="form-control  login_input" autocomplete="off">
			</div>
			 
			<label class="form-label pt-2" for="new_password">New Password</label>
			<div class="login_input_container">
				<input type="text" name="new_password" id="new_password"     placeholder="G;ir43tg:S"   class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="password_confirm">Re-enter Password</label>
			<div class="login_input_container">
				<input type="text" name="password_confirm" id="password_confirm"       class="form-control  login_input"  required="" autocomplete="off">
			</div> 
			<div class="py-3">
				<input type="submit" value="Change Password"     class="btn btn-dark mb-4">
			</div>
				 
		</form>
	  </div>
	   
	</div>
  </div>
</div>



<!-- model/ div for  update basic details-->
<div class="modal fade" id="updateBasicDetailModel" tabindex="-1" aria-labelledby="updateBasicDetailModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" id="productImageLabel">Update Basic Details</h4>
		<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
			<i class="bi bi-x-lg  fw-bolder fs-5 "></i>
		</button>
	  </div>
	  <div class="modal-body">
		 
		<form action="{{route('vendor.basicDetailUpdate')}}" method="POST" >
			@csrf
			  
			<label class="form-label pt-2" for="name_id">Name</label>
			<div class="login_input_container">
				<input type="text" name="name" id="name_id"  value="{{auth()->user()->vendors->name}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="brand_name_id">Brand Name</label>
			<div class="login_input_container">
				<input type="text" name="brand_name" id="brand_name_id"  value="{{auth()->user()->vendors->brand_name}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="gstin_id">GSTIN</label>
			<div class="login_input_container">
				<input type="text" name="gstin" id="gstin_id"  value="{{auth()->user()->vendors->gstin}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="mobile_number_id">Mobile Number</label>
			<div class="login_input_container">
				<input type="text" name="mobile_number" id="mobile_number_id"  value="{{auth()->user()->mobile_number}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="country_id">Country</label>
			<div class="login_input_container">
				<input type="text" name="country" id="country_id"  value="{{auth()->user()->vendors->country}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="state_id">State</label>
			<div class="login_input_container">
				<input type="text" name="state" id="state_id"  value="{{auth()->user()->vendors->state}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="city_id">City</label>
			<div class="login_input_container">
				<input type="text" name="city" id="city_id"  value="{{auth()->user()->vendors->city}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			<label class="form-label pt-2" for="pincode_id">Pincode</label>
			<div class="login_input_container">
				<input type="text" name="pincode" id="pincode_id"  value="{{auth()->user()->vendors->pincode}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div> 
			<label class="form-label pt-2" for="landmark_id">Landmark</label>
			<div class="login_input_container">
				<input type="text" name="landmark" id="landmark_id"  value="{{auth()->user()->vendors->landmark}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>

			<div class="py-3">
				<input type="submit" value="Update"     class="btn btn-dark mb-4">
			</div>
				 
		</form>
	  </div>
	   
	</div>
  </div>
</div>






<!-- model/ div for  update account details-->
<div class="modal fade" id="updateAccountDetailModel" tabindex="-1" aria-labelledby="updateAccountDetailModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" id="productImageLabel">Update Account Details</h4>
		<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
			<i class="bi bi-x-lg  fw-bolder fs-5 "></i>
		</button>
	  </div>
	  <div class="modal-body">
		 
		<form action="{{route('vendor.paymentDetailUpdate')}}" method="POST" >
			@csrf
			  
			<label class="form-label pt-2" for="payment_id_id">Payment ID</label>
			<div class="login_input_container">
				<input type="text" name="payment_id" id="payment_id_id"  value="{{auth()->user()->vendors->payment_id}}"  class="form-control  login_input"  required="" autocomplete="off">
			</div>
			 

			<div class="py-3">
				<input type="submit" value="Update"     class="btn btn-dark mb-4">
			</div>
				 
		</form>
	  </div>
	   
	</div>
  </div>
</div>