@extends('customer/layout')
@section('productList')
		
<main class="home_container pb-5">

@include('customer/searchBar')
	<section class="w-100     bg-white special_Offer" style="min-height:100vh; height:auto;">
		@if($products->total() > 0)
		 
			<h5 class="text-center pt-4" >Total {{$products->total()}} products are available.... </h5>
		 
		@else
			<h5 class="text-center pt-4" >No products are available</h5> 
		@endif
		
			<!-- List of products-->
		<div class="row justify-content-center  w-100 mx-auto py-5  ">
	
			@foreach($products as $product)
				 
				 @include('customer/product_card', ['product' => $product])
			@endforeach
		</div>
		 
	</section>
	@if($products->total() > 20)
		<div class="w-100 py-4 "    >
		
			<ul class="pagination  justify-content-center">
				@if($products->onFirstPage())
					<li class="page-item"><span class="btn   border border-2 me-1 ">Prev</span></li>
				@else 
					<li class="page-item"><a href="{{$products->previousPageUrl()}}"   class="   btn  btn-light border border-2 me-1">Prev</a></li>
				@endif
				@if($products->hasMorePages())
					<li class="page-item"><a href="{{$products->nextPageUrl()}}"  class=" btn  btn-light border border-2 ms-1">Next</a></li>
				 @else
					 <li class="page-item"><span class="   btn border border-2 ms-1">Next</span></li> 
				@endif
			</ul>
		</div>
	@endif
	 
	 <script> 
		const element1 = document.getElementById("navigation_link_products"); 
		const element2 = document.getElementById('navigation_link_products1'); 
		element1.classList.add("active_navigation_link");
		element2.classList.add("active_navigation_link");
	</script>
</main>

@endsection