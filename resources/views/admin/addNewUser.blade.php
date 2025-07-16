<div class="w-100 h-auto   my-3 px-1 px-md-4 py-4  shadow collapse rounded   " id="add_container">
	<div class="d-flex flex-wrap justify-content-between align-items-center">
		<h3 class=" m-0 mb-3 " >Add New User</h3>
		<button type="button" class="btn  p-0 px-2 btn-light   border-0  " 
					data-bs-toggle="collapse" data-bs-target="#add_container"><i class="bi bi-x-lg  fw-bolder fs-5 "></i></button>
	</div>
	
	<form action="{{route('admin.addNewUser')}}"   method="post">
		@csrf
		<div class="row w-100 mx-auto align-items-end  ">
			<div class="col-12 py-1 ">
				<input type="radio" class ="form-check-input login_check " name="user_role" value="3" id="customer_id2" checked  />
				<label for="customer_id2" class="form-label ps-2  pe-3 " >Customer</label>
				<input type="radio" class ="form-check-input login_check " name="user_role" value="2" id="vendor_id2"   />
				<label for="vendor_id2" class="form-label ps-2  " >Seller</label>
			</div>
			<div class="col-12 col-sm-6 col-lg-4 py-1">
				<label class="form-label   " for="email_id2">Email <span class="text-danger">*</span></label>
				<input type="email" class="form-control login_input"  name="email" id="email_id2" required="true" autocomplete="off"/>
			</div>
			
			<div class="col-12 col-sm-6 col-lg-4 py-1">
					<label class="form-label    " for="password_id2">Password <span class="text-danger">*</span></label>
					<input type="text" class="form-control login_input"  name="password" id="password_id2" required="true" autocomplete="off"/>
			</div>
			<div class="col-12 col-sm-6 col-lg-4    pt-3 py-lg-1">
				<button type="submit" class="btn btn-dark  w-100 h-100  ">Submit</button>
			</div>
		</div>
	</form>
</div>