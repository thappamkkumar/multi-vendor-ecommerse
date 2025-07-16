<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash; 
//use models 
use App\Models\User;
use App\Models\Customer;
use App\Models\Vendor;

use Exception;
class UserController extends Controller
{
    /*	In this controller all the functions are related to user registeration.
		sendOTP function is use to send otp to user 
		emailCheck function is use to check user entered email is unique within the user database table. It send false if email is already exist.
		addUser function is use to add user data into database table
	*/
	
	//Function to return login registration page
	function registerPage()
	{
		try
		{
			return view('register');
		}
		catch(Exception $e)
		{ 
			$message = $e->getMessage();
			return view('error', compact('message'));
		}
	}
	
	 
	 
	//Function to add new User
	function addUser(Request $request)
	{
		$validated_data=$request->except('_token');
		 
		$userData = [];
		$userData['email'] = $validated_data['email'];
		$userData['password'] = Hash::make($request->password);
		$userData['mobile_number'] = $validated_data['contact'];
		$userData['user_role'] = $validated_data['user_role'];
		$userData['email_verified_at'] = now();
		
		try
		{
			
			$user = User::create($userData); 
			if($userData['user_role'] == User::USER_ROLE)
			{
				$customerData = [];
				$customerData['user_id'] = $user->id; 
				$customerData['name'] = $validated_data['name']; 
				$customerData['area_street_sector_village'] = ""; 
				$customerData['flat_houseno_building_company'] = ""; 
				$customerData['landmark'] = ""; 
				$customerData['district'] = ""; 
				$customerData['state'] = ""; 
				$customerData['country'] = ""; 
				$customerData['pincode'] = ""; 
				$customerData['profile_image'] = "";  
				
				$customer = Customer::create($customerData);  
 			}
			if($userData['user_role'] == User::SELLER_ROLE)
			{
				$vendorData = [];
				$vendorData['user_id'] = $user->id; 
				$vendorData['name'] = $validated_data['name']; 
				$vendorData['brand_name'] = ""; 
				$vendorData['categories'] = ""; 
				$vendorData['gstin'] = ""; 
				$vendorData['city'] = ""; 
				$vendorData['state'] = ""; 
				$vendorData['country'] = ""; 
				$vendorData['pincode'] = ""; 
				$vendorData['landmark'] = ""; 
				$vendorData['payment_id'] = ""; 
				$vendorData['brand_logo'] = "";  
				
				$vendor = Vendor::create($vendorData);
			}
			$data = ['status' => 'true'];
			return response()->json($data);  
			//return redirect()->route('loginPage')->with('Success', 'Account is created successfully.');
				
		}
		catch(Exception $e)
		{
			//return redirect()->route('registerPage')->with('danger', $e->getMessage());
			$data = ['status' => 'false'];
			return response()->json($data);	
		}
		 
	}
	
}
