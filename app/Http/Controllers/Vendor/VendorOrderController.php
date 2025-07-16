<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order; 
use Exception;
class VendorOrderController extends Controller
{
	 
	//function for update order status 
	function orderStatusUpdate(Request $request)
	{
		try
		{
			$order = Order::findorfail($request->order_id);
			$order->order_status = $request->order_status;
			$order->save();
			return redirect()->route("vendor.orderDetail", ["order" => $order])->with('success', 'Order Status Is Updated Successfully.');
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
	//function for order detail
	function orderDetail(Order $order)
	{
		try
		{
			$prepage=session('user_back');
			$pre=$prepage[count($prepage)-1];
			if($pre!==url()->full())
			{
				$prepage[]=url()->full();
			}
			session(['user_back'=> $prepage ]);
			
			return View('vendor.orderDetail', compact('order'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
    //function for update specification Updated
	function orderList()
	{
		try
		{ 
			if(session()->has('user_search_input'))
			{
				session()->forget('user_search_input');
				 
			}
			session(['user_back'=> [url()->full()] ]);
			$user_id = auth()->user()->id;
			$orders = Order::WhereHas('product', function ($query) use ($user_id) {
				$query->where('user_id', $user_id );
			})->orderBy('id','DESC')->paginate(10);
			 return View('vendor.orderList', compact('orders'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}	
	}
}
