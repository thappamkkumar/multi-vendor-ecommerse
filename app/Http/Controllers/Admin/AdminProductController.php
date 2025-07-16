<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Categories;
use App\Models\User;
use Exception;
class AdminProductController extends Controller
{
	//function for product de-activate and activate
	function productDeactivate(Product $product)
	{
		try
		{ 
			$product->is_active= $product->is_active ^ 1;
			$product->save();
			if($product->is_active == 0)
			{ 
				return redirect()->route("admin.productDetail", ["product" => $product])->with('success', 'Product Is De-actived Successfully.');
			}
			else
			{
				return redirect()->route("admin.productDetail", ["product" => $product])->with('success', 'Product Is Actived Successfully.');
			}	
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		};		
	}
	//function for product search
	function productSearch(Request $request)
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
			$products = Product::where('name', 'like', "%$searchName%")->orderBy('id','DESC')->paginate(10);
			return View('admin/productSearch', compact('products'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
	
	//Function for product details
	function productDetail(Product $product)
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
			$product->specification = json_decode($product->specification);
			
			$product->thumnail = $product->thumnail
			? url(Storage::url('product_thumnail/' . $product->thumnail))  
			: null;
				
			$images = json_decode($product->images); 
			if (is_array($images)) {
					foreach ($images as $key => $image) {
							$images[$key] = $image
									? url(Storage::url('product_images/' . $image))
									: null;
					}
			}
			$product->images = $images;
			
			$rating_list = $product->reviews->take(20);
			foreach ($rating_list as $review) {
							$review->user->customers->profile_image = $review->user->customers->profile_image
									? url(Storage::url('user_profile/' . $review->user->customers->profile_image))
									: null;
					}
			$product->reviews = $rating_list;
			
			return View('admin/productDetail', compact('product'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
	
    //Function for product list
	function productList($filterType, $filterName)
	{
		try
		{
			if(session()->has('user_search_input'))
			{
				session()->forget('user_search_input');
				 
			}
			$prepage=session('user_back');
			$pre=$prepage[count($prepage)-1];
			if($pre!==url()->full())
			{
				$prepage[]=url()->full();
			}
			session(['user_back'=> $prepage ]);
			
			$products;
			 $allProduct=0;
			if($filterType == 'seller')
			{ 
				$products = Product::where('user_id',$filterName)->orderBy('id','DESC')->paginate(10); 
			}
			elseif($filterType == 'category')
			{  
				$products = Product::where('category_id',$filterName)->orderBy('id','DESC')->paginate(10);
			}
			else
			{ 
				$products = Product::orderBy('id','DESC')->paginate(10);
				$allProduct=1;
			}
			 
			$categories = Categories::distinct()->get();
			$users = User::where('user_role', 2)->distinct()->get();			
			return View('admin/productList', compact('products','categories','users','allProduct'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
}
