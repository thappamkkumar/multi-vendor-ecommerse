<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
 
use App\Models\Product; 
use App\Models\Order;  
use App\Models\Payment; 
use Exception;
class VendorController extends Controller
{
	//function for update payments detail
	function paymentDetailUpdate(Request $request)
	{
		$validated_data = $request->validate([  
			'payment_id'=>'required',
		]);
		try
		{  
		 	$user = auth()->user(); 
			
			$user->vendors->payment_id = $validated_data['payment_id'];
			$user->vendors->save();
			 
			return redirect()->route("vendor.profile")->with('success', 'Payment Detail Is Successfully.');
			 
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//function for basic detail update
	function basicDetailUpdate(Request $request)
	{
		$validated_data = $request->validate([ 
			'mobile_number'=>'numeric|nullable',
			'name'=>'required',			
			'brand_name'=>'required', 
			'gstin'=>'required',
			'landmark'=>'required',
			'city'=>'required',
			'state'=>'required',
			'country'=>'required',
			'pincode'=>'required', 
		]);
		
		try
		{  
			$user = auth()->user(); 
			$user->mobile_number = $validated_data['mobile_number'];
			$user->save();
			$user->vendors->update([
				'name'=> $validated_data['name'],
				'brand_name'=> $validated_data['brand_name'], 
				'gstin'=> $validated_data['gstin'],
				'landmark'=> $validated_data['landmark'],
				'city'=> $validated_data['city'],
				'state'=> $validated_data['state'],
				'country'=> $validated_data['country'],
				'pincode'=> $validated_data['pincode'], 
			]);
			
			
			return redirect()->route("vendor.profile")->with('success', 'Basic Detail Is Successfully.');
			 
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//function for change customer profile image and vendor logo
	function  changeLogo(Request $request)
	{
		$validated_data = $request->validate([
			'image'=>'required|mimes:jpg,jpeg,png',
			 
		]);
		try
		{  
			$user = auth()->user();
			$existingProfile = $user->vendors->brand_logo;
			
			 //check the profile image in exist in folder
			 //if exist than delete
			 
			$imagePath = 'user_profile/' . $existingProfile;
			if (Storage::disk('public')->exists($imagePath)) {  
				Storage::disk('public')->delete($imagePath);
			} 
			
			//get user email and generate name for image
			$user_email=strstr($user->email,'@',true);		 
			$imageName=$user_email.'_image.'.$request->image->extension();
			//move image to folder 
			$request->image->storeAs('user_profile', $imageName, 'public');
			
			$user->vendors->brand_logo = $imageName;  
			$user->vendors->save();
			
			
			return redirect()->route("vendor.profile")->with('success', 'Image Is Changed Successfully.');
			 
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//function for change password
	public function changePassword(Request $request)
	{
		
		if(Hash::check($request->password,auth()->user()->password))
		{
			
			$validated_data=$request->validate([
				'new_password'=>['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
				'password_confirm' => 'required|same:new_password',
			]);
			try
			{
				$validated_data['password']=Hash::make($request->new_password);
				 
				auth()->user()->update(['password'=>$validated_data['password']]);
				Auth::logout();
				$request->session()->invalidate();
				$request->session()->regenerateToken();
				return redirect('/');
			}
			catch(Exception $e)
			{
				$message = $e->getMessage();
				return View('error', compact('message'));
			}
		}
		else
		{
			return redirect()->route('vendor.profile')->with('danger', 'Current Password is not exist in our database.');
		}
	}
	//function for vendor profile
	function profile()
	{
		try
		{
			if(session()->has('user_search_input'))
			{
				session()->forget('user_search_input');
				 
			}
			session(['user_back'=> [url()->full()] ]);
			 
			return View('vendor/profile' );
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
    //function for dashboard of vendor
	function dashboard()
	{
		try
		{
			if(session()->has('user_search_input'))
			{
				session()->forget('user_search_input');
				 
			}
			session(['user_back'=> [url()->full()] ]);
			$user_id = auth()->user()->id;
			
			$products=Product::where('user_id',$user_id)->count();
			
			$orders=Order::whereHas('product', function ($query) use ($user_id) {
							$query->where('user_id', $user_id);
						})->count();
						
			$payments=Payment::where('vendor_id',$user_id)->count();
			 
			$records_total=[
						 
						'products'=>$products,
						'orders'=>$orders,
						
						'payments'=>$payments,
					];	
			
			
			return View('vendor/dashboard',compact('records_total'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
}
