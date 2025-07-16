 	<div class=" w-100 h-auto  py-3  px-2    ">
		<form action="{{ route('productSearch') }}" method="post" onsubmit="return validateSearch()">
			@csrf
			<div class="input-group 	 rounded-2 overflow-hidden    border-0 p-0 mx-auto searchInputContainer"  >
				<input 
				type="search" 
				id="searchInput" 
				class="form-control  flex-grow-1 home_search_input" 
				name="search_input" 
				placeholder="Search for you product."
				value="{{ session('user_search_input') ?? '' }}"			
				autocomplete="off" 
				>
				
			 <button type="submit" class="btn  search_btn   fs-2 fw-bold">
					 <i class="bi bi-search"></i>
				
				</button>
				 
			</div>
		</form>
	</div> 

<script>
function validateSearch() {
  const searchInput = document.getElementById('searchInput').value.trim();
  if (searchInput.length === 0) {
    
    return false;
  }
  return true;
}
</script>
