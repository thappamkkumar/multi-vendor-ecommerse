<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

//use controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserBackController;
use App\Http\Controllers\Customer\CustomerProductController;
use App\Http\Controllers\Customer\CustomerCartController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Customer\CustomerProfileController;

use App\Http\Controllers\Admin\AdminControler;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminTransectionController;
use App\Http\Controllers\Admin\AdminPaymentController;


use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorOrderController;
use App\Http\Controllers\Vendor\VendorPaymentController;
use App\Http\Controllers\Vendor\VendorCategoriesController;

//use models 
use App\Models\Categories;
use App\Models\Product;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*  Route for home page. This route don't have any middleware to check user role or authentication*/
 Route::get('/', function () {
		
		session(['user_back'=> [url()->full()] ]);
		if(session()->has('user_search_input'))
		{
			session()->forget('user_search_input');
			 
		}
		$specialOffers=Product::where('sale_price','>',0)->where('is_active','=',1)->inRandomOrder()->take(8)->get()->unique();
		
		foreach ($specialOffers as  $product) {
				$product->thumnail = $product->thumnail
				? url(Storage::url('product_thumnail/' . $product->thumnail))  
				: null;
		}
		
		$products=Product::where('is_active','=',1)->orderBy('id','DESC')->take(8)->get();
		foreach ($products as  $product) {
					$product->thumnail = $product->thumnail
					? url(Storage::url('product_thumnail/' . $product->thumnail))  
					: null;
			}
		
		//$categories = Categories::where('is_active','=',1)->inRandomOrder()->take(6)->get();
		 
		  
		return view('home', compact('specialOffers', 'products'));
	})->name('home')->middleware('checkroleUserhome');
	

/*
	Group route for controller AuthenticationController. 
	This route group have routes for user Authentication.
*/
Route::controller(AuthenticationController::class)->group(
	function (){
		Route::get('/login','loginPage')->name('loginPage');
		Route::post('/authenticate','authenticate')->name('authenticate');
		Route::get('/confirmLogout','logoutPage')->name('logoutPage');
		Route::get('/logout','logout')->name('logout');
	}
);

/*
	Group route for controller UserController. 
	This route group have routes for user registration.
*/
Route::controller(UserController::class)->group(
	function (){
		Route::get('/register','registerPage')->name('registerPage');
		Route::post('/addUser','addUser')->name('addUser');
	}
);
	

/*
	Group route for controller UserBackController. 
	This route group have routes for user back session operations.

*/
Route::controller(UserBackController::class)->group(
	function (){
		//Route for user back .....
		Route::get('/userBack','userBack')->name('userBack');
	}
);




/* 
	this is group route with middleware to check the user is login or not. 
	Here auth is Aliases for middleware Authentication.
	This group middleware group all the routes and group route for customer, vendor, and admin.
*/
Route::group(['middleware' => ['auth']],
	function()
	{
		
		/*
			Group route for controller CustomerProductController. 
			This route group have routes for customer product operations like product list, product details,
			search product, category list, category products et.
		*/
		Route::controller(CustomerProductController::class)->group(
			function (){
				//Route for product search
				//Route::post('/productSearch','productSearch')->name('productSearch');
				//Route::get('/productSearch','productSearch')->name('productSearch');
				Route::match(['get', 'post'], '/productSearch', 'productSearch')->name('productSearch');

				//Route for product details.....
				Route::get('/productDetail/{productCode}','productDetail')->name('productDetail');
				//Route for product rating
				Route::post('/productRating','productRating')->name('productRating');
				//Route for product list 
				Route::get('/productList','productListForUser')->name('productListForUser');
				//Route for categories 
				Route::get('/categories','categoriesList')->name('categoriesListForUser');
				//Route  for product of specific category
				Route::get('/categoryProduct/{category}', 'categoryProduct')->name('categoryProductForUser');
				 
			}
		);
		//controller group route for customer cart .
		Route::controller(CustomerCartController::class)->group(
			function (){
				 
				//Route for user cart list
				Route::get('/cartList','cartList')->name('userCartList');
				//Route for increament cart quantity
				Route::get('/increaseQuantity/{cart}','increaseQuantity')->name('increaseQuantity');
				//Route for decrement cart quantity
				Route::get('/decreaseQuantity/{cart}','decreaseQuantity')->name('decreaseQuantity');
				//Route for remove product from cart
				Route::get('/removeCart/{cart}','removeCart')->name('removeCart');
				//Route for add product into cart list. 
				Route::get('/addToCart/{productData}','addToCart')->name('addToCart');
			}
		);
		//controller group route for customer order operations loke placing order, add payment gateway, order list etc.
		Route::controller(CustomerOrderController::class)->group(
			function (){
				 
				//Route for customer cart list
				Route::get('/orderList','orderList')->name('userOrderList');
				//Route for address verification for customer order
				Route::get('order-verification/{product}', 'orderVerfication')->name('orderVerfication');
				//Route for phonepe response.
				Route::post('/payment-response','paymentResponse')->name('paymentResponse');  
				//Route for place order
				Route::post('place-order','placeOrder')->name('placeOrder');
			}
		);
		//controller group route for customer profile.
		Route::controller(CustomerProfileController::class)->group(
			function (){
				 
				//Route for user cart list
				Route::get('/profile','userProfile')->name('userProfile');
				//Route for change user profile image
				Route::post('/changeUserProfileImage','change_profile_image')->name('user_profile_image_change');
				//Route for change  user password
				Route::post('/changeUserPassword','change_user_password')->name('change_user_password');
				//Route for update profile detail
				Route::post('/updateUserProfileDetails','update_details')->name('user_profile_update');
				//Route for address update-product-vedio-url
				Route::post('/update-address', 'updateAddress')->name('updateAddress');
				
			}
		);
		
		
		
		
		//group route for admin with prefix and middleware 
		Route::group(['prefix' => '/admin', 'middleware' => ['checkAdminRole']],
			function()
			{
				//controller group route for admin dashboard and admin profile
				Route::controller(AdminControler::class)->group(
					function (){
						//Route for dashboard
						Route::get('/dashboard','dashboard')->name('admin.dashboard');
						//Route for profile
						Route::get('/profile','profile')->name('admin.profile');
						//Route for logo change 
						Route::post('/logo-change', 'logoChange')->name('admin.logoChange');
						//Route for basic details
						Route::post('/basic-detail','basicDetail')->name('admin.basicDetail');
						//Route for payment gateway
						Route::post('update-payment-gateway','updatePaymentGatewayDetail')->name('admin.updatePaymentGatewayDetail');
						//Route for update home page details like heading discount and image 
						Route::post('home-page-detail','homePageDetail')->name('admin.homePageDetail');
						//Route for change home page image 
						Route::post('home-page-image-change','homeImageChange')->name('admin.homeImageChange');
						
						
						//Route for change admin password
						Route::post('change-password','changeAdminPassword')->name('admin.changeAdminPassword');
						
					}
				);
				//controller group route for user section.
				Route::controller(AdminUserController::class)->group(
					function (){
						//Route for user list
						Route::get('/userList/user={user}','userList')->name('admin.userList');
						//Route for user search
						//Route::post('/user-search','userSearch')->name('admin.userSearch');
						//Route::get('/user-search','userSearch')->name('admin.userSearch');
						Route::match(['get', 'post'], '/user-search', 'userSearch')->name('admin.userSearch');
						//Route for user profile
						Route::get('/user-profile/{user}','userProfile')->name('admin.userProfile');
						//Route for change customer profile image or vendor logo
						Route::post('/user-profile-image-change','userProfileImageChange')->name('admin.userProfileImageChange');
						//Route for de-activate user 
						Route::get('/user-de-activate/{user}', 'userDeActivate')->name('admin.userDeActivate');
						//Route for update customer details
						Route::post('/customer-detail-update', 'updateCustomer')->name('admin.updateCustomer');
						//Route for update vendor details
						Route::post('/seller-detail-update', 'updateVendor')->name('admin.updateVendor');
						//Route for add new user 
						Route::post('/add-new-user','addNewUser')->name('admin.addNewUser');
					}
				);
				//controller group route for user section.
				Route::controller(AdminCategoriesController::class)->group(
					function (){
						//Route for category list
						Route::get('/category-list','categoryList')->name('admin.categoryList');
						//Route for add new category
						Route::post('/add-new-category','addNewCategory')->name('admin.addNewCategory');
						//Route for view category detail
						Route::get('/category-detail/{category}','categoryDetail')->name('admin.categoryDetail');
						//route for update category details
						Route::post('/category-detail-update','categoryDetailUpdate')->name('admin.categoryDetailUpdate');
						//Route for category de-active and active 
						Route::get('/category-de-activate/{category}','categoryDeactive')->name('admin.categoryDeactive');
					}
				);
				//controller group route for product section.
				Route::controller(AdminProductController::class)->group(
					function (){
						//Route for product list
						Route::get('/product-list/{filterType}/{filterName}','productList')->name('admin.productList');
						 //Route for product details
						 Route::get('/product-detail/{product}','productDetail')->name('admin.productDetail');
						//Route for product search
						//Route::post('/product-search','productSearch')->name('admin.productSearch');
					//	Route::get('/product-search','productSearch')->name('admin.productSearch');
						Route::match(['get', 'post'], '/product-search', 'productSearch')->name('admin.productSearch');

						//Route for de activate and activate the product-detail 
						Route::get('/product-de-activate/{product}', 'productDeactivate')->name('admin.productDeactivate');
					}
				);
				//controller group route for order section.
				Route::controller(AdminOrderController::class)->group(
					function (){
						//Route for order list
						Route::get('/order-list','orderList')->name('admin.orderList');
						//Route for order detail
						Route::get('order-detail/{order}', 'orderDetail')->name('admin.orderDetail');
						//Route for update order status
						Route::post('order-status-update', 'orderStatusUpdate')->name('admin.orderStatusUpdate');
						//Route for order search 
						//Route::post('/order-search','orderSearch')->name('admin.orderSearch');
						//Route::get('/order-search','orderSearch')->name('admin.orderSearch');
						Route::match(['get', 'post'], '/order-search', 'orderSearch')->name('admin.orderSearch');
					}
				);
				//controller group route for transection section.
				Route::controller(AdminTransectionController::class)->group(
					function (){
						//Route for transection list
						Route::get('/transection-list','transectionList')->name('admin.transectionList');
						 //Route for transection search 
						//Route::post('/transection-search','transectionSearch')->name('admin.transectionSearch');
						//Route::get('/transection-search','transectionSearch')->name('admin.transectionSearch');
						Route::match(['get', 'post'], '/transection-search', 'transectionSearch')->name('admin.transectionSearch');
						//Route for transection detail
						Route::get('transection-detail/{transection}', 'transectionDetail')->name('admin.transectionDetail');
					}
				);
				//controller group route for payment section.
				Route::controller(AdminPaymentController::class)->group(
					function (){
						//Route for payment list
						Route::get('/payment-list','paymentList')->name('admin.paymentList');
						//Route for payment search 
						//Route::post('/payment-search','paymentSearch')->name('admin.paymentSearch');
						//Route::get('/payment-search','paymentSearch')->name('admin.paymentSearch');
						Route::match(['get', 'post'], '/payment-search', 'paymentSearch')->name('admin.paymentSearch');
						Route::post('/pay-vendor',  'payVendor')->name('admin.payVendor');
					}
				);
			}
		);
		
		
	//group route for vendor with prefix and middleware 
		Route::group(['prefix' => '/vendor', 'middleware' => ['checkVendorRole']],
			function()
			{
				//controller group route for dashboard and profile section.
				Route::controller(VendorController::class)->group(
					function (){
						//Route for dashboard
						Route::get('/dashboard','dashboard')->name('vendor.dashboard');
						
						//Routes for profile
						Route::get('profile', 'profile')->name('vendor.profile');
						//Route for change user/vendor/seller password
						Route::post('change-password','changePassword')->name('vendor.changePassword');
						//Route for change user/vendor/seller brand logo/ profile image-change
						Route::post('change-logo', 'changeLogo')->name('vendor.changeLogo');
						//Route for basic detail detail
						Route::post('basic-detail-update', 'basicDetailUpdate')->name('vendor.basicDetailUpdate');
						//Route for basic payment detail 
						Route::post('payment-detail-update', 'paymentDetailUpdate')->name('vendor.paymentDetailUpdate');
					}
				);
				//controller group route for product section.
				Route::controller(VendorProductController::class)->group(
					function (){
						//Route for dashboard
						Route::get('/product-list/{filterType}/{filterName}','productList')->name('vendor.productList');
						//Route for product search
						//Route::post('/product-search','productSearch')->name('vendor.productSearch');
						//Route::get('/product-search','productSearch')->name('vendor.productSearch');
						Route::match(['get', 'post'], '/product-search', 'productSearch')->name('vendor.productSearch');
						//Route for product details
						Route::get('/product-detail/{product}','productDetail')->name('vendor.productDetail');
						//Route for de activate and activate the product-detail 
						Route::get('/product-de-activate/{product}', 'productDeactivate')->name('vendor.productDeactivate');
						//Route for add new product 
						Route::get('/add-product', 'addProduct')->name('vendor.addProduct');
						//Route for store product
						Route::post('/store-product','storeProduct')->name('vendor.storeProduct');
						
						
						//Routes for updating product detail-update
						Route::get('/update-product/{product}', 'updateProduct')->name('vendor.updateProduct');
						//route for product thumanil update-product-vedio-url
						Route::post('/product-thumanil-update','productThumnailUpdate')->name('vendor.productThumnailUpdate');
						//Route for update product images   
						Route::post('/product-images-update', 'productImagesUpdate')->name('vendor.productImagesUpdate');
						//Route for add product images 
						Route::post('/add-product-images', 'productImagesADD')->name('vendor.productImagesADD');
						//Route for delete all images-update
						Route::get('/delete-all-image-of-product/{product}','deleteProductAllImage')->name('vendor.deleteProductAllImage');
						//Route for update product basic details
						Route::post('/product-basic-detail-update','productBasicDetailUpdate')->name('vendor.productBasicDetailUpdate');
						//Route for update product description
						Route::post('/product-description-update','productDescriptionUpdate')->name('vendor.productDescriptionUpdate');
						//Route for update product vedio url
						Route::post('/product-vedio-url-update', 'productVedioUrlUpdate')->name('vendor.productVedioUrlUpdate');
						//Route for product specification update
						Route::post('product-specification-update','productSpecificationUpdate')->name('vendor.productSpecificationUpdate');
					}
				);//controller group route end for product section.
				
				//controller group route for order section.
				Route::controller(VendorOrderController::class)->group(
					function (){
						//Route for order ist
						Route::get('/order-list','orderList')->name('vendor.orderList');
						//Route for order details
						Route::get('order-detail/{order}', 'orderDetail')->name('vendor.orderDetail');
						//Route for update order status
						Route::post('order-status-update', 'orderStatusUpdate')->name('vendor.orderStatusUpdate');
						 
					}
				);//controller group route end for order section.
				
				//controller group route for payment section.
				Route::controller(VendorPaymentController::class)->group(
					function (){
						//Route for payment ist
						Route::get('/payment-list','paymentList')->name('vendor.paymentList');
						
					}
				);//controller group route end for payment section.
				
				
				//controller group route for category section.
				Route::controller(VendorCategoriesController::class)->group(
					function (){
						//Route for categories List  
						Route::get('/category-list','categoriesList')->name('vendor.categoriesList');
						//route for activate and de-activate category
						Route::get('/remove-category/{category}', 'removeCategory')->name('vendor.removeCategory');
						//Route for add new catogory  
						Route::get('/add-category/{category}', 'addCategory')->name('vendor.addCategory');
					}
				);//controller group route end for category section.
				
			}
		);
	}
);
	
	
	