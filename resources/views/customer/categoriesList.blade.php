@extends('customer/layout')
@section('categoriesList')
		
<main class="home_container pb-5">

@include('customer/searchBar')
	<section class="w-100   py-5" style="min-height:100vh; height:auto;">
		<h5 class="text-center"   >Total {{$categories->total()}} categories are available.... </h5>
		<div class=" py-4 d-flex flex-wrap justify-content-center align-items-center  "  id="category_cont_id">
			@foreach($categories as $category)
			<a href="{{route('categoryProductForUser',['category'=>$category])}}" class="btn   m-2 category"   >{{$category->name}}<i class="bi bi-arrow-right ps-2"></i></a>
			@endforeach
			 
		</div>
 
	</section>
	@if($categories->total() > 60)
		<div class="w-100 py-4 "   >
		
			<ul class="pagination  justify-content-center">
				@if($categories->onFirstPage())
					<li class="page-item"><span class="btn   border border-2 me-1 ">Prev</span></li>
				@else 
					<li class="page-item"><a href="{{$categories->previousPageUrl()}}"   class="   btn  btn-light border border-2 me-1">Prev</a></li>
				@endif
				@if($categories->hasMorePages())
					<li class="page-item"><a href="{{$categories->nextPageUrl()}}"  class=" btn  btn-light border border-2 ms-1">Next</a></li>
				 @else
					 <li class="page-item"><span class="   btn border border-2 ms-1">Next</span></li> 
				@endif
			</ul>
		</div>
	@endif
	 
	 <script> 
		const element1 = document.getElementById("navigation_link_categories"); 
		const element2 = document.getElementById("navigation_link_categories1"); 
		element1.classList.add("active_navigation_link");
		element2.classList.add("active_navigation_link");
	</script>
</main>

@endsection