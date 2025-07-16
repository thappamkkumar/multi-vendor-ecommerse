<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\Product;

use Exception;
class VendorCategoriesController extends Controller
{
	//function for add new category
	function addCategory(Categories $category)
	{
		try
		{
			$userCategory = auth()->user()->vendors->categories; 
			if (!is_array($userCategory) || $userCategory === null) {
				$userCategory = [];
			}		
			 
			$userCategory[] = $category->id;
			
			 auth()->user()->vendors->categories = $userCategory;
			 auth()->user()->vendors->save();
			return redirect()->route("vendor.categoriesList" )->with('success', 'New Category Is Add Successfully.');
		
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
	//function for remove  categoryIds
	function removeCategory(Categories $category)
	{
		try
		{
			$userCategory = auth()->user()->vendors->categories;

			// Check if $userCategory is empty or not an array
			if ( $userCategory === null || !is_array($userCategory)) {
					return redirect()->route("vendor.categoriesList")
							->with('info', 'No categories found to remove.');
			}
			
			$userNewCategory = [];
        foreach ($userCategory as $catId) {
            if ($catId == $category->id) {
                continue;
            }
            $userNewCategory[] = $catId;
        }
				
			auth()->user()->vendors->categories = $userNewCategory;
			auth()->user()->vendors->save();
			return redirect()->route("vendor.categoriesList" )->with('success', 'Category removed successfully. ');
		
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
    //function for Categories list
	function categoriesList()
	{
		try
		{
			
			$user_ID = auth()->user()->id;
			$categoryIds = auth()->user()->vendors->categories;
			  
			if (!is_array($categoryIds) || $categoryIds === null) {
				 
				$categoryIds = [];
			}			
			
			$categories = Categories::whereIn('id', $categoryIds)->paginate(10);
			foreach($categories as $categoryy)
			{
				$categoryy->product_count = Product::where('user_id',$user_ID )->where('category_id',$categoryy->id)->count();
					 
			} 
			$allCategories = Categories::whereNotIn('id', $categoryIds)->get();
			 
			return View('vendor/categoriesList', compact('categories', 'allCategories'));
		}
		catch(Exception $e)
		{
			$message = $e->getMessage();
			return View('error', compact('message'));
		}
	}
}
