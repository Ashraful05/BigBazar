<?php



//Route::get('/', function () {return view('welcome');});
Route::get('/',[
   'uses' => 'FrontEnd\FrontEndController@index',
   'as'   => '/'
]);

//Google or Socialite login route....
Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'GoogleLoginController@callback');

//FrontEnd route is here.......
Route::post('/save-newsletter','FrontEnd\FrontEndController@saveNewsLetter')->name('save-newsletter');
// Add Wishlist.......
Route::get('/add/wishlist/{id}','WishlistController@addWishlist')->name('add-wishlist');
// Cart route.....
Route::get('/add/to/card/{id}','CartController@addCard')->name('add-card');
Route::get('/show/cart','CartController@showCard')->name('show-cart');
Route::get('/check','CartController@check')->name('check');
Route::get('/remove/cart/{rowId}','CartController@removeCart')->name('remove-cart');
Route::post('/update/cart/item','CartController@updateCart')->name('update-cart-item');
Route::get('/cart/product/view/{id}','CartController@viewProduct');
Route::post('/insert/into/cart','CartController@insertCart')->name('insert-into-cart');
//checkout route is here......
Route::get('/user/checkout','CartController@userCheckout')->name('user-checkout');
Route::get('/user/wishlist','CartController@userWishlist')->name('user-wishlist');
Route::post('/user/apply/coupon','CartController@applyCoupon')->name('apply-coupon');
Route::get('/user/remove/coupon','CartController@removeCoupon')->name('coupon-remove');
//payment route is here........
Route::get('/payment/page','CartController@paymentPage')->name('payment-step');
Route::post('/payment/process','PaymentController@paymentProcess')->name('payment-process');
Route::post('/stripe/charge','PaymentController@stripeCharge')->name('stripe-charge');
Route::post('/oncash/charge','PaymentController@oncashCharge')->name('oncash-charge');
// product details route is here.....
Route::get('/product/details/{id}/{product_name}','ProductDetailsController@productDetails')->name('product.details');
//Add product to cart
Route::post('add/card/product/{id}','ProductDetailsController@addCartProduct')->name('add-card-product');
//Language route is here...
Route::get('/language/english','BlogController@englishLanguage')->name('english-language');
Route::get('/language/hindi','BlogController@hindiLanguage')->name('hindi-language');
Route::get('/blog/single/details/{id}','BlogController@blogSingleDetails');
//Blog post route.........
Route::get('/blog/post','BlogController@blog')->name('blog-post');
//Subcategory wise product view
Route::get('products/{id}','ProductDetailsController@productView');
Route::get('all-category/{id}','ProductDetailsController@categoryView');

//Order Tracking route.....
Route::post('order/tracking','FrontEnd\FrontEndController@orderTracking')->name('order-tracking');
// User Return Order route...
Route::get('success/list','PaymentController@successList')->name('success-list');
Route::get('request/return/{id}','PaymentController@returnRequest');

//Contact Page route.....

Route::get('contact/page','ContactController@contactPage')->name('contact-page');
Route::post('contact/save','ContactController@saveContactPage')->name('save-contact-page');
//All message route....
Route::get('admin/all/message','ContactController@allMessage')->name('all-message');
//Product Search route......
Route::post('/product/search','CartController@productSearch')->name('product-search');
//Customer register login and Logout.......
Route::get('customer/register','FrontEnd\FrontEndController@userLogin')->name('customer-register');
Route::get('customer/login','FrontEnd\FrontEndController@userLogin')->name('customer-login');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

//Password Change and Update
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');



//admin=======
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/blogger', 'Auth\LoginController@showBloggerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/blogger', 'Auth\RegisterController@showBloggerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/blogger', 'Auth\LoginController@bloggerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/blogger', 'Auth\RegisterController@createBlogger');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin.home')->middleware('auth:admin')->name('admin-home');
// Route::view('/admin', 'admin');

Route::view('/blogger', 'blogger')->middleware('auth:blogger');
// Route::view('/blogger', 'blogger');

//Route::get('admin/home', 'AdminController@index');
//Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
//Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');

Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');

Route::post('admin/logout', 'AdminController@logout')->name('admin.logout');

//Category route is here......
Route::get('admin/manage-categories',[
    'uses' => 'Admin\Category\CategoryController@manageCategory',
    'as'   => 'manage-category'
]);

// SEO setting route.....
Route::get('admin/add-seo','Admin\Category\CategoryController@addSEO')->name('add-seo');
Route::post('admin/update/seo/{id}','Admin\SeoController@updateSEO')->name('update-seo');

Route::post('admin/save-category',[
    'uses' => 'Admin\Category\CategoryController@saveCategory',
    'as'   => 'save-category'
]);
Route::get('admin/edit-category/{id}',[
    'uses' => 'Admin\Category\CategoryController@editCategory',
    'as'   => 'edit-category'
]);
Route::post('admin/update-category/{id}',[
    'uses' => 'Admin\Category\CategoryController@updateCategory',
    'as'   => 'update-category'
]);
Route::get('admin/delete-category/{id}',[
    'uses' => 'Admin\Category\CategoryController@deleteCategory',
    'as'   => 'delete-category'
]);
//Brand route is here.....
Route::get('admin/manage-brand',[
    'uses' => 'Admin\Category\BrandController@manageBrand',
    'as'   => 'manage-brand'
]);
Route::post('admin/save-brand',[
    'uses' => 'Admin\Category\BrandController@saveBrand',
    'as'   => 'save-brand'
]);
Route::get('admin/edit-brand/{id}',[
    'uses' => 'Admin\Category\BrandController@editBrand',
    'as'   => 'edit-brand'
]);
Route::post('admin/update-brand/{id}',[
    'uses' => 'Admin\Category\BrandController@updateBrand',
    'as'   => 'update-brand'
]);
Route::get('admin/delete-brand/{id}',[
    'uses' => 'Admin\Category\BrandController@deleteBrand',
    'as'   => 'delete-brand'
]);
//SubCategory route is here.........
Route::get('admin/manage-sub-category',[
    'uses' => 'Admin\Category\SubCategoryController@manageSubCategory',
    'as'   => 'sub-category'
]);
Route::post('admin/save-subcategory',[
    'uses' => 'Admin\Category\SubCategoryController@saveSubCategory',
    'as'   => 'save-subcategory'
]);
Route::get('admin/edit-subcategory/{id}',[
    'uses' => 'Admin\Category\SubCategoryController@editSubCategory',
    'as'   => 'edit-subcategory'
]);
Route::post('admin/update-subcategory/{id}',[
    'uses' => 'Admin\Category\SubCategoryController@updateSubCategory',
    'as'   => 'update-subcategory'
]);
Route::get('admin/delete-subcategory/{id}',[
    'uses' => 'Admin\Category\SubCategoryController@deleteSubCategory',
    'as'   => 'delete-subcategory'
]);
//Coupon route is here.......
Route::get('admin/coupons', 'Admin\Category\CouponController@manageCoupon')->name('manage-coupon');
Route::post('admin/save-coupon', 'Admin\Category\CouponController@saveCoupon')->name('save-coupon');
Route::get('admin/edit-coupon/{id}','Admin\Category\CouponController@editCoupon')->name('edit-coupon');
Route::post('admin/update-coupon/{id}','Admin\Category\CouponController@updateCoupon')->name('update-coupon');
Route::get('admin/delete-coupon/{id}','Admin\Category\CouponController@deleteCoupon')->name('delete-coupon');

//NewsLetter route is here......
Route::get('admin/newsletter','Admin\Category\CouponController@manageNewsLetter')->name('manage-newsletter');
Route::get('admin/delete-newsLetter/{id}','Admin\Category\CouponController@deleteNewsLetter')->name('delete-newsLetter');

//Route for subcategory url with ajax.....
Route::get('/get/subcategory/{category_id}','Admin\Product\ProductController@getSubCategory');
//Product route is here...
Route::get('admin/add-product','Admin\Product\ProductController@addProduct')->name('add-product');
Route::post('admin/save-product','Admin\Product\ProductController@saveProduct')->name('save-product');
Route::get('admin/manage-product','Admin\Product\ProductController@manageProduct')->name('manage-product');
Route::get('admin/edit-product/{id}','Admin\Product\ProductController@editProduct')->name('edit-product');
Route::post('admin/update-product/without-image/{id}','Admin\Product\ProductController@updateProductWithOUtImage')->name('update-product-without-images');
Route::post('admin/update-product/with-image/{id}','Admin\Product\ProductController@updateProductWithImage')->name('update-product-with-images');
Route::get('admin/delete-product/{id}','Admin\Product\ProductController@deleteProduct')->name('delete-product');
Route::get('admin/view-product/{id}','Admin\Product\ProductController@viewProduct')->name('view-product');
Route::get('admin/inactive-product/{id}','Admin\Product\ProductController@inActiveProduct')->name('inactive-product');
Route::get('admin/active-product/{id}','Admin\Product\ProductController@activeProduct')->name('active-product');
Route::get('admin/product-details/{id}','Admin\Product\ProductController@productDetails')->name('product-details');

//multiple language route is here....
Route::get('add/blog/category/list','Admin\PostController@addBlogCategory')->name('add-blog-category');
Route::post('save/blog/category/list','Admin\PostController@saveBlogCategory')->name('save-blog-category');
Route::get('delete/blog/category/{id}','Admin\PostController@deleteBlogCategory')->name('delete-blog-category');
Route::get('edit/blog/category/{id}','Admin\PostController@editBlogCategory')->name('edit-blog-category');
Route::post('update/blog/category/{id}','Admin\PostController@updateBlogCategory')->name('update-blog-category');

Route::get('add/blog/post','Admin\PostController@addBlogPost')->name('add-blog-post');
Route::post('save/blog/post','Admin\PostController@saveBlogPost')->name('save-blog-post');
Route::get('manage/blog/post','Admin\PostController@manageBlogPost')->name('manage-blog-post');
Route::get('edit/blog/post/{id}','Admin\PostController@editBlogPost')->name('edit-blog-post');
Route::post('update/blog/post/{id}','Admin\PostController@updateBlogPost')->name('update-blog-post');
Route::get('delete/blog/post/{id}','Admin\PostController@deleteBlogPost')->name('delete-blog-post');

//Order route is here.......
Route::get('new/order','Admin\OrderController@newOrder')->name('new-order');
Route::get('view/order/{id}','Admin\OrderController@viewOrder')->name('view-order');
Route::get('order/accept/{id}','Admin\OrderController@orderAccept')->name('order-accept');
Route::get('order/cancel/{id}','Admin\OrderController@orderCancel')->name('order-cancel');
Route::get('order/history','Admin\OrderController@orderHistory')->name('accept-order-history');
Route::get('cancel/order/history','Admin\OrderController@orderCancelHistory')->name('cancel-order-history');
Route::get('/order/progress/history','Admin\OrderController@orderProgressHistory')->name('progress-order-history');
Route::get('/order/delivery/history','Admin\OrderController@orderDeliveryHistory')->name('delivered-order-history');
Route::get('delivery/process/{id}','Admin\OrderController@deliveryProcess');
Route::get('delivery/done/{id}','Admin\OrderController@deliveryDone');

// Order Report route......
Route::get('today/order','Admin\ReportController@todayOrder')->name('today-order');
Route::get('today/delivery','Admin\ReportController@todayDelivery')->name('today-delivery');
Route::get('this/month/delivery','Admin\ReportController@thisMonthDelivery')->name('this-month-delivery');
Route::get('search/report','Admin\ReportController@searchReport')->name('search-report');
Route::post('search/by/year','Admin\ReportController@searchByYear')->name('search-by-year');
Route::post('search/by/month','Admin\ReportController@searchByMonth')->name('search-by-month');
Route::post('search/by/date','Admin\ReportController@searchByDate')->name('search-by-date');

// Admin role route......
Route::get('admin/all/user','Admin\UserRoleController@userRole')->name('admin-all-user');
Route::get('admin/create/user','Admin\UserRoleController@createUser')->name('admin-create-user');
Route::post('admin/save','Admin\UserRoleController@saveAdmin')->name('save-admin');
Route::get('admin/delete/{id}','Admin\UserRoleController@deleteAdmin')->name('delete-admin');
Route::get('admin/edit/{id}','Admin\UserRoleController@editAdmin')->name('edit-admin');
Route::post('admin/update','Admin\UserRoleController@updateAdmin')->name('update-admin');

//Admin Website setting route....
Route::get('admin/site/setting','Admin\SiteSettingController@siteSetting')->name('admin-site-setting');
Route::post('admin/update/site/setting','Admin\SiteSettingController@updateSiteSetting')->name('update-site-setting');

// Admin Accept Return Request route.....
Route::get('admin/return/request','Admin\ReturnOrderController@returnRequest')->name('return-request');
Route::get('admin/return/approve/{id}','Admin\ReturnOrderController@returnApprove')->name('approve-return');
Route::get('admin/return/all','Admin\ReturnOrderController@allReturn')->name('all-return');

//Order Stock route.......
Route::get('admin/product/stock','Admin\UserRoleController@productStock')->name('product-stock');








