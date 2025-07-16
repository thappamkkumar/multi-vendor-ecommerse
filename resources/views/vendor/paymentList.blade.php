@extends('vendor/layout')
@section('vendor.paymentList')
<section class="p-0 pt-2 p-md-4 h-auto parent_add_container" >


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
	
	
	 
	 
	
	<div class="w-100 h-auto p-1 p-md-4 shadow rounded">
		 
		 
		
		<div class="py-2 px-2 d-flex flex-wrap justify-content-between align-items-center  table_header " style="--bs-bg-opacity:0.3;">
			<div>
				<i class="bi bi-table"></i>
				<span class="px-2">Showing={{$payments->count()}}, Total={{$payments->total()}} payments, Page={{ $payments->currentPage()}}@if( $payments->total() >1 ) / {{ ceil($payments->total()/10) }} @endif</span>
			</div>
			 
			 
		</div>
		  
		<!-- Table for product List-->
		 <table class="table table-borderless   table_data">
			<thead>
				<tr>
					<th class="col-1">S No.</th>
					<th>Order ID</th>
					<th>Amount</th>  
					<th>Date</th>  
					 
				</tr>
			</thead>
			<tbody>
				@php $s_no = 1; @endphp
				@foreach($payments as $payment)
					<tr>
						<td class="col-1  ">{{$s_no++}}</td> 
						
						<td class="col-1  ">  
							<a href="{{ route('vendor.orderDetail', ['order' => $payment->order]) }}" class="text-decoration-none">
									{{ $payment->order->order_number }}
							</a>
						</td> 
						<td class="col-1  ">{{$payment->amount}}</td>  
						<td class="col-1  "> @if($payment->created_at != null){{ $payment->created_at->day }}/{{ $payment->created_at->month }}/{{ $payment->created_at->year }} @endif</td>  
						 
					</tr>
					 
				@endforeach
			</tbody>
			 
		 </table> 
		
		<!-- Pagination buttons -->
		@if($payments->total() > 10)
			<div class="w-100 py-4 "     >
			
				<ul class="pagination  justify-content-center">
					@if($payments->onFirstPage())
						<li class="page-item"><span class="btn   border border-2 me-1 ">Prev</span></li>
					@else 
						<li class="page-item"><a href="{{$payments->previousPageUrl()}}"
							class="   btn  paginateBTN border border-2 me-1">Prev</a></li>
					@endif
					@if($payments->hasMorePages())
						<li class="page-item"><a href="{{$payments->nextPageUrl()}}" 
						class=" btn  paginateBTN border border-2 ms-1">Next</a></li>
					 @else
						 <li class="page-item"><span class="   btn border border-2 ms-1">Next</span></li> 
					@endif
				</ul>
			</div>
		@endif
	</div>
	
	
	<script> 
		const element1 = document.getElementById("navigation_link_payments"); 
		const element2 = document.getElementById("navigation_link_payments1"); 
		element1.classList.add("active_admin_navigation_link");
		element2.classList.add("active_admin_navigation_link");
		
		 
	</script>
	 <script src="{{asset('vender/js/admin/formSubmit.js')}}"></script>
</section>
@endsection
