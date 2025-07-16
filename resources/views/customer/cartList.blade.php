@extends('customer/layout')
@section('cartList')
		
<main class="home_container pb-5">

 
	<section class="w-100  py-4" style="min-height:100vh; height:auto;">
		
		@include('alert_box')
		@if($cartList->total() > 0)
		 
			<h5 class="text-center  "   >Total {{$cartList->total()}} products are available.... </h5>
		 
		@else
			<h5 class="text-center  "   >No products are available</h5> 
		@endif
		
			<!-- List of products-->
			<div class="row w-100 mx-auto py-5  ">
	
				@foreach($cartList as $cart)
					 
					 
					<div class="col-12 col-sm-12  col-lg-6 py-2 py-md-3 px-2 px-md-3  "  >
						<div class="row mx-auto cart p-3">
							<div class="col-12 col-sm-6 d-flex p-0"><img src="{{ $cart->product->thumnail}}" alt="product image" class="cart_product_image" onerror="this.onerror=null;this.src='{{ asset('images/imageError.jpg') }}';"> </div>
							<div class="col-12 col-sm-6 sub_cart_2 ">
								<div class="cart_delete_container"> 
									 <a href="{{route('removeCart',['cart'=>$cart])}}" class="btn cart_delete_btn bg-transparent"><i class="bi bi-trash" ></i></a>
								</div>
								 <div class=" pb-2 px-3">
									<h5 >{{$cart->product->name}}  </h5>
									@if($cart->product->sale_price > 0)
										<p class="p-0 m-0"><span class="fw-bold">Rs. </span>{{$cart->product->sale_price}}</p>
									@else
										<p class="p-0 m-0"><span class="fw-bold">Rs. </span>{{$cart->product->price}}</p>
									@endif
										<a href="{{route('productDetail',['productCode'=>$cart->product])}}"  class="p-0 m-0 text-decoration-none  cart_product_detail">Detail <i class="bi bi-arrow-right   "></i></a>
								</div>
								<div class=" px-2 py-2">
									<div class="d-flex flex-wrap justify-content-start align-items-center  py-2">
										<h6>Quantity :- </h6>
										<div class="    px-3">
											@if($cart->quantity > 0)
											<a href="{{route('decreaseQuantity',['cart'=>$cart])}}" class="btn m-0 p-0 cart_quantity_btn">-</a>
											@else
												<span class="btn m-0 p-0 cart_quantity_btn">-</span>
											@endif
											<p class="cart_quantity">{{$cart->quantity}}</p>
											
											@if($cart->product->stock > $cart->quantity)
											 <a href="{{route('increaseQuantity',['cart'=>$cart])}}" class="btn m-0 p-0 cart_quantity_btn">+</a>
											@else
												<span class="btn m-0 p-0 cart_quantity_btn">+</span>
											@endif
											
											 
										</div>
									</div>
									<div class="d-flex  flex-wrap py-2">
										<h6>Total :-</h6>
										@if($cart->product->sale_price > 0)
											<p class="p-0 px-3 m-0"><span class="fw-bold">Rs. </span>{{$cart->product->sale_price * $cart->quantity}}</p>
										@else
											<p class="p-0 px-3 m-0"><span class="fw-bold">Rs. </span>{{$cart->product->price * $cart->quantity }}</p>
										@endif
									</div>
									<div class=" ">
										  <a href="{{route('orderVerfication',['product'=>$cart->product])}}" class="btn  btn-dark w-auto h-auto fw-bold">BUY NOW</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
		</div>
		 
	</section>
	@if($cartList->total() > 10)
		<div class="w-100 py-4 "    >
		
			<ul class="pagination  justify-content-center">
				@if($cartList->onFirstPage())
					<li class="page-item"><span class="btn   border border-2 me-1 ">Prev</span></li>
				@else 
					<li class="page-item"><a href="{{$cartList->previousPageUrl()}}"   class="   btn  btn-light border border-2 me-1">Prev</a></li>
				@endif
				@if($cartList->hasMorePages())
					<li class="page-item"><a href="{{$cartList->nextPageUrl()}}"  class=" btn  btn-light border border-2 ms-1">Next</a></li>
				 @else
					 <li class="page-item"><span class="   btn border border-2 ms-1">Next</span></li> 
				@endif
			</ul>
		</div>
	@endif
	 
	 <script> 
		const element1 = document.getElementById("navigation_link_carts"); 
		const element2 = document.getElementById("navigation_link_carts1"); 
		element1.classList.add("active_navigation_link");
		element2.classList.add("active_navigation_link");
	</script>
</main>

@endsection