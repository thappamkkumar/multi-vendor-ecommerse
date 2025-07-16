<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment; 
use Exception;
class VendorPaymentController extends Controller
{
    //function for payment
	function paymentList()
	{
		try
		{ 
			if(session()->has('user_search_input'))
			{
				session()->forget('user_search_input');
				 
			}
			session(['user_back'=> [url()->full()] ]);
			
			$user_id = auth()->user()->id;
			$payments = Payment::where('vendor_id', $user_id )->orderBy('id','DESC')->paginate(10);
			 return View('vendor.paymentList', compact('payments'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}	
	}
}
