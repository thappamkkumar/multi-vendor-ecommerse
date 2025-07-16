<div class="w-100 h-auto   my-3 px-1 px-md-4 py-4  shadow collapse   " id="add_container">
	<div class="d-flex flex-wrap justify-content-between align-items-center">
		<h3 class="  " >Add New Category</h3>
		<button type="button" class="btn  p-0 px-2 btn-light   border-0  " 
					data-bs-toggle="collapse" data-bs-target="#add_container"><i class="bi bi-x-lg  fw-bolder fs-5 "></i></button>
	</div>
	
	<form action="{{route('admin.addNewCategory')}}"   method="post">
		@csrf
		<div class="row w-100 mx-auto align-items-end  py-2 ">
			<div class="col-12 col-sm-6 col-lg-4  py-1 ">
				 <label class="form-label   " for="name_id">Category Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control login_input"  name="name" id="name_id" required="true" autocomplete="off"/>
			</div>
			<div class="col-12 col-sm-6 col-lg-4 py-1"> 
				<label class="form-label   " for="slug_id">Slug <span class="text-danger">*</span></label> 
				<input type="text" class="form-control login_input"  name="slug" id="slug_id" required="true" autocomplete="off"/>
			</div>
			
			<div class="col-12 col-sm-6 col-lg-4 py-1">
				<label class="form-label    " for="gst_id">GST <span class="text-danger">*</span></label>
				<div class="input-group"> 
					<input type="number" class="form-control login_input"  name="gst" id="gst_id" required="true" autocomplete="off"/>
					<span class="input-group-text login_input">%</span>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-4 py-2">
				<button type="submit" class="btn  btn-dark w-100 h-100  ">Submit</button>
			</div>
		</div>
	</form>
	<p class=" pt-4"><span class="fw-bold fs-5">Note :- </span> Slug are word that can help user to search product. For example, if you have category name is category then slug is like category1-category2-category-3. Slug must be combination of word (saperate by - ) that are related to category name.</p>
</div>