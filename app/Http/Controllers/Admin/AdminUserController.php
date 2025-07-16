<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use  Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

use App\Models\User;  
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Categories;

use Exception;
class AdminUserController extends Controller
{
	//Function for add new user-
	function addNewUser(Request $request)
	{
		$validated_data = $request->validate([ 
			'user_role'=>'required',
			'email'=>'required|email|unique:users,email',			
			'password'=>['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
			 
		]);
		$userData = [];
		$userData['email'] = $validated_data['email'];
		$userData['password'] = Hash::make($request->password);
		$userData['mobile_number'] = "";
		$userData['user_role'] = $validated_data['user_role']; 
		
		try
		{
			
			$user = User::create($userData); 
			if($userData['user_role'] == User::USER_ROLE)
			{
				$customerData = [];
				$customerData['user_id'] = $user->id; 
				$customerData['name'] = ""; 
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
				$vendorData['name'] = ""; 
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
			return redirect()->route('admin.userList', ['user' => 'all'])->with('success', 'New User Is Added Successfully.');
		} 
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//Function for update Vendor details
	function updateVendor(Request $request)
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
			'payment_id'=>'required',
		]);
		try
		{ 
			$user = User::find($request->userID);
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
				'payment_id'=> $validated_data['payment_id'],
			]);
			 
			
			return redirect()->route("admin.userProfile", ["user" => $user])->with('success', 'User Profile Is Updated Successfully.');
		
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//Function for update customer details
	function updateCustomer(Request $request)
	{
		$validated_data = $request->validate([
			'name'=>'required',
			'mobile_number'=>'numeric|nullable', 
			'area_street_sector_village'=>'required',
			'flat_houseno_building_company'=>'required',
			'landmark'=>'required',
			'district'=>'required',
			'state'=>'required',
			'country'=>'required',
			'pincode'=>'required',
		]);
		try
		{ 
			$user = User::find($request->userID);
			$user->mobile_number = $validated_data['mobile_number'];
			$user->save();
			$user->customers->update([
				'name'=> $validated_data['name'],
				'area_street_sector_village'=> $validated_data['area_street_sector_village'],
				'flat_houseno_building_company'=> $validated_data['flat_houseno_building_company'],
				'landmark'=> $validated_data['landmark'],
				'district'=> $validated_data['district'],
				'state'=> $validated_data['state'],
				'country'=> $validated_data['country'],
				'pincode'=> $validated_data['pincode'],
			]);
			 
			
			return redirect()->route("admin.userProfile", ["user" => $user])->with('success', 'User Profile Is Updated Successfully.');
		
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
		 
	}
	//Function for user  activate and de-activate
	function userDeActivate(User $user)
	{
		try
		{ 
			$user->is_active= $user->is_active ^ 1;
			$user->save();
			if($user->is_active == 0)
			{
				return redirect()->route("admin.userProfile", ["user" => $user])->with('success', 'User Is De-actived Successfully.');
			}
			else
			{
				return redirect()->route("admin.userProfile", ["user" => $user])->with('success', 'User Is Actived Successfully.');
			}	
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};		
	}
	//function for change customer profile image and vendor logo
	function userProfileImageChange(Request $request)
	{
		$validated_data = $request->validate([
			'image'=>'required|mimes:jpg,jpeg,png',
			 
		]);
		try
		{  
			$user = User::find($request->userID);
			$existingProfile = null;
			if($user->user_role == User::USER_ROLE)
			{
				$existingProfile = $user->customers->profile_image;
			}
			if($user->user_role == User::SELLER_ROLE)
			{
				$existingProfile = $user->vendors->brand_logo;
			}
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
			 
			//check user role to update image
			if($user->user_role == User::USER_ROLE)
			{
				$user->customers->profile_image = $imageName;
				$user->customers->save();				
			}
			if($user->user_role == User::SELLER_ROLE)
			{
				$user->vendors->brand_logo = $imageName;  
				$user->vendors->save();
			}
			
			return redirect()->route("admin.userProfile", ["user" => $user])->with('success', 'Image Is Changed Successfully.');
			 
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//function for user profile
	function UserProfile(User $user)
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
			
			if($user->user_role == 2 )
			{
				if(is_array($user->vendors->categories))
				{
					$categoryIds = $user->vendors->categories; 
					$categoryList = Categories::whereIn('id', $categoryIds)->get() ;
					$cat_ies = [];
					foreach($categoryList as $category )
					{
						$cat_ies[] = $category->name;
					}
					$user->vendors->categories = implode(', ', $cat_ies);
				}
				
				$vendor = $user->vendors;  
				if ($vendor) {
						$vendor->brand_logo = $vendor->brand_logo
								? url(Storage::url('user_profile/' . $vendor->brand_logo))
								: null;
				}
			}
			else
			{
				$customer = $user->customers; 
				if ($customer) {
						$customer->profile_image = $customer->profile_image
								? url(Storage::url('user_profile/' . $customer->profile_image))
								: null;
				}
			}
			
			 return View('admin.userProfile', compact('user'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};
	}
	//function for search userList
	function userSearch(Request $request)
	{ 		
		$validator = Validator::make(['email' => $request->userSearchInput], [
			'email' => 'required|email',
		]);
		try
		{ 
			$prepage=session('user_back');
			$pre=$prepage[count($prepage)-1];
			if($pre!==url()->full())
			{
				$prepage[]=url()->full();
			}
			session(['user_back'=> $prepage ]);
			
			$users=null;//Variable to store user list fetched from database
			
			$searchName = null;
			if(isset($request->userSearchInput))
			{ 
				$searchName = $request->userSearchInput;
				session(['user_search_input'=> $searchName ]);
			}
			else
			{
				$searchName=session('user_search_input'); 
			}
			
			//Searching from database
			if ($validator->passes()) 
			{
				$users=User::whereNot('user_role',1)->where('email',$searchName)->orderBy('id','DESC')->paginate(10);
			
			} else 
			{ 
				
				 $users = User::whereNot('user_role',1)->whereHas('customers', function ($query) use ($searchName) {
								$query->where('name', 'like', "%$searchName%");
							})
							->orWhereHas('vendors', function ($query) use ($searchName) {
								$query->where('name', 'like', "%$searchName%");
							})
							->orderBy('id','DESC')->paginate(10);
			} 
			  
			return View('admin/userSearch', compact('users'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
    //funtion for user list
	function userList($user)
	{
		try
		{
			if(session()->has('user_search_input'))
			{
				session()->forget('user_search_input');
				 
			}
			session(['user_back'=> [url()->full()] ]);
			$users =null;$role=$user;
			if($user == "vendors")
			{ 
				$users=User::where('user_role',2)->orderBy('id','DESC')->paginate(10);
			}
			else if($user == "customers")
			{ 
				$users=User::where('user_role',3)->orderBy('id','DESC')->paginate(10);
			}
			else
			{
				$users=User::whereNot('user_role',1)->orderBy('id','DESC')->paginate(10);
			}
			
			 return View('admin/userList', compact('users', 'role'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
		
	}
}
