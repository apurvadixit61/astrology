<?php
header("Access-Control-Allow-Origin: *");
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/mytesting', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
////////////////////////////////////////////////////////////////////////////////////////

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

 */

Route::get('/admin', function () {

    return view('auth.login');

});

Route::get('/all', 'App\Http\Controllers\Front_end\HomeController@all');
Route::post('/paysuccess', 'App\Http\Controllers\Front_end\HomeController@razorPaySuccess');
Route::get('/confirm-request/{id}', 'App\Http\Controllers\Front_end\HomeController@confirmrequest')->name('confirm-request');
Route::get('/kundli-detail/{id}', 'App\Http\Controllers\Front_end\HomeController@kundli_detail')->name('kundli-detail');


Route::get('/signin', 'App\Http\Controllers\Front_end\HomeController@login')->name('signin');
Route::get('/signup', 'App\Http\Controllers\Front_end\HomeController@signup')->name('signup');

Route::get('/', 'App\Http\Controllers\Front_end\HomeController@index');
Route::get('/kundli', 'App\Http\Controllers\Front_end\HomeController@kundli');
Route::get('/getKundliImagesdata', 'App\Http\Controllers\Front_end\HomeController@getKundliImagesdata');
Route::get('/getMahaDasha', 'App\Http\Controllers\Front_end\HomeController@getMahaDasha');
Route::get('/getHoroChartImage', 'App\Http\Controllers\Front_end\HomeController@getHoroChartImage');
Route::get('/getAntarDasha/{major_dasha}', 'App\Http\Controllers\Front_end\HomeController@getAntarDasha');
Route::get('/getPratyantarDasha/{major_dasha}/{antar_dasha}', 'App\Http\Controllers\Front_end\HomeController@getPratyantarDasha');
Route::get('/getSookshmadasha/{major_dasha}/{antar_dasha}/{prantar_dasha}', 'App\Http\Controllers\Front_end\HomeController@getSookshmadasha');

//horoscope
Route::get('/dailyHoroscope/{zodiacSign}','App\Http\Controllers\Front_end\HomeController@dailyHoroscope')->name('dailyHoroscope');
Route::get('/tomorrow_horoscope/{zodiacSign}','App\Http\Controllers\Front_end\HomeController@tomorrow_horoscope')->name('tomorrow_horoscope');
Route::get('/weekly_horoscope/{zodiacSign}','App\Http\Controllers\Front_end\HomeController@weekly_horoscope')->name('weekly_horoscope');
Route::get('/monthly_horoscope/{zodiacSign}','App\Http\Controllers\Front_end\HomeController@monthly_horoscope')->name('monthly_horoscope');
Route::get('/yearly_horoscope/{zodiacSign}','App\Http\Controllers\Front_end\HomeController@yearly_horoscope')->name('yearly_horoscope');

//horoscope end
Route::get('/chat-with-astrologer','App\Http\Controllers\Front_end\HomeController@chatWithAstrologer');
Route::get('/call-with-astrologer','App\Http\Controllers\Front_end\HomeController@callWithAstrologer');
Route::match(array('GET', 'POST'), 'free-kundli', 'App\Http\Controllers\Front_end\HomeController@getKundli')->name('free-kundli');
Route::match(array('GET', 'POST'), 'match-making', 'App\Http\Controllers\Front_end\HomeController@matchmaking')->name('match-making');


Route::get('/getMajorYoginiDasha', 'App\Http\Controllers\Front_end\HomeController@getMajorYoginiDasha');
Route::get('/getPlanetaryReport', 'App\Http\Controllers\Front_end\HomeController@getPlanetaryReport');
Route::get('/getRudhraksSuggest', 'App\Http\Controllers\Front_end\HomeController@getRudhraksSuggest');




Route::get('/blog', function () {
    return view('front_end.blog');
})->name('blog');

Route::get('/services', function () {
    return view('front_end.services');
})->name('services');

Route::get('/horoscope', function () {
    return view('front_end.horoscope');
})->name('horoscope');

Route::get('/profile', function () {
    return view('front_end.users.profile');
});

Route::get('lang/change', 'App\Http\Controllers\Front_end\HomeController@change')->name('changeLang');

Route::get('/admin/logout', 'App\Http\Controllers\HomeController@getLogout')->name('getLogout');

Auth::routes();

Route::post('/get_subcategory_list', 'App\Http\Controllers\Productcontroller@get_subcategory_list');
Route::post('/get_subcategory_list', 'App\Http\Controllers\Productcontroller@get_subcategory_list');

/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'view_profile'])->name('ashtro.profile');

Route::get('clearall', 'App\Http\Controllers\HomeController@clearall');
// Route::get('profile', 'App\Http\Controllers\HomeController@profile');
Route::post('/add_user', 'App\Http\Controllers\HomeController@add_user');
Route::post('/edit_user', 'App\Http\Controllers\HomeController@edit_user');

Route::get('/add_user', 'App\Http\Controllers\HomeController@profile');

Route::post('/getuserdata', 'App\Http\Controllers\BusinessController@getuserdata')->name('getuserdata');
Route::post('/getastrodata', 'App\Http\Controllers\BusinessController@getastrodata')->name('getastrodata');

Route::post('/changeAastrostatus', 'App\Http\Controllers\HomeController@changeAastrostatus')->name('changeAastrostatus');

Route::get('/gallery_delete/{id}', 'App\Http\Controllers\BusinessController@gallery_delete');
Route::get('/user', 'App\Http\Controllers\BusinessController@index');
Route::get('/withdrawal_request', 'App\Http\Controllers\BusinessController@withdrawal_request');
Route::get('/generated_kundli', 'App\Http\Controllers\BusinessController@generated_kundli');
Route::post('/changeWithdrawStatusData', 'App\Http\Controllers\BusinessController@changeWithdrawStatusData')->name('changeWithdrawStatusData');
Route::post('/checkEmailData', 'App\Http\Controllers\BusinessController@checkEmailData')->name('checkEmailData');
Route::post('/getbillingdata', 'App\Http\Controllers\BusinessController@getbillingdata')->name('getbillingdata');

Route::get('/astro_news', 'App\Http\Controllers\BusinessController@astro_news');
Route::get('/gallery', 'App\Http\Controllers\BusinessController@gallery');
Route::post('/uploadgalleries', 'App\Http\Controllers\BusinessController@uploadgalleries');
Route::post('/edit_news', 'App\Http\Controllers\BusinessController@edit_news');
Route::get('/client_testimonial', 'App\Http\Controllers\BusinessController@client_testimonial');
Route::get('/live_events', 'App\Http\Controllers\BusinessController@live_events');
Route::post('/edit_events', 'App\Http\Controllers\BusinessController@edit_events');
Route::get('/notification', 'App\Http\Controllers\BusinessController@notification');
Route::get('/checknotificationdata', 'App\Http\Controllers\BusinessController@checknotificationdata');
Route::get('/billing', 'App\Http\Controllers\BusinessController@billing');

Route::get('/astrologers', 'App\Http\Controllers\BusinessController@astrologer');
Route::get('/get_astro_data', 'App\Http\Controllers\BusinessController@get_astro_data');

Route::post('/add_event', 'App\Http\Controllers\BusinessController@add_event');
Route::post('/add_news', 'App\Http\Controllers\BusinessController@add_news');

Route::post('/add_testimonial', 'App\Http\Controllers\BusinessController@add_testimonial');
Route::post('/edit_testimonial', 'App\Http\Controllers\BusinessController@edit_testimonial');

Route::post('/add_notification', 'App\Http\Controllers\BusinessController@add_notification');
Route::post('/create', 'App\Http\Controllers\BusinessController@create');
Route::post('/subcreate', 'App\Http\Controllers\BusinessController@subcreate');
Route::get('/view_bcategory', 'App\Http\Controllers\BusinessController@view_category');
Route::get('/view_bsubcategory', 'App\Http\Controllers\BusinessController@view_subcategory');

Route::get('/delete_user/{id}', 'App\Http\Controllers\HomeController@delete_user');
Route::get('/delete_users123/{id}', 'App\Http\Controllers\BusinessController@delete_users123');
Route::get('/delete_users12/{id}', 'App\Http\Controllers\BusinessController@delete_users12');
Route::get('/delete_users1/{id}', 'App\Http\Controllers\BusinessController@delete_users1');
// Route::post('/create','Usercontroller@create');

// Route::post('/adduser','Usercontroller@adduser');

// Route::get('/edit_profile/{id}','Usercontroller@edit_profile');

// Route::post('/post_edit_profile','Usercontroller@post_edit_profile');

// Route::post('/edit_password','Usercontroller@edit_password');

// Route::get('/delete_user/{id}','Usercontroller@delete_user');

// Route::post('/post_permission','Usercontroller@post_permission');

Route::get('/product', 'App\Http\Controllers\Productcontroller@index');

Route::post('/create_product', 'App\Http\Controllers\Productcontroller@create_product');
Route::post('/update_category_product', 'App\Http\Controllers\Productcontroller@update_category_product');

Route::post('/product-subcategory', 'App\Http\Controllers\Productcontroller@subcreate');

Route::post('/addproduct', 'App\Http\Controllers\Productcontroller@addproduct');

Route::get('/loadgallery/{id}', 'App\Http\Controllers\Productcontroller@loadgallery');

Route::post('/uploadgallery', 'App\Http\Controllers\Productcontroller@uploadgallery');

Route::get('/edit_product/{id}', 'App\Http\Controllers\Productcontroller@edit_product');

Route::post('/post_edit_product', 'App\Http\Controllers\Productcontroller@post_edit_product');

Route::get('/delete_product/{id}', 'App\Http\Controllers\Productcontroller@delete_product');

Route::get('/view_category', 'App\Http\Controllers\Productcontroller@view_category');
Route::get('/view_subcategory', 'App\Http\Controllers\Productcontroller@view_subcategory');

Route::get('/shipping_charge', 'Productcontroller@shipping_charge');

Route::post('/post_shipping_charge', 'Productcontroller@post_shipping_charge');

Route::get('/coupan_code', 'Productcontroller@coupan_code_list');

Route::post('/addcoupan', 'Productcontroller@addcoupan_code');

Route::get('/edit_coupan/{id}', 'Productcontroller@edit_coupan');

Route::post('/post_edit_coupan', 'Productcontroller@post_edit_coupan');

Route::get('/delete_coupan/{id}', 'Productcontroller@delete_coupan');

Route::get('/order', 'Ordercontroller@index');

Route::get('/view_order/{id}', 'Ordercontroller@view_order');

Route::get('/edit_order/{id}', 'Ordercontroller@edit_order');

Route::post('/post_edit_order', 'Ordercontroller@post_edit_order');

Route::get('/finance', 'Financecontroller@index');

Route::get('/invoice/{id}', 'Financecontroller@view_invoice');

Route::get('/customer', 'Customercontroller@index');

Route::get('/view_customerprofile/{id}', 'Customercontroller@view_customerprofile');

Route::get('/status_change/{id}', 'Customercontroller@status_change');

Route::get('/edit_customerprofile/{id}', 'Customercontroller@edit_customerprofile');

Route::post('/post_edit_customerprofile', 'Customercontroller@post_edit_customerprofile');

Route::post('/edit_customerpassword', 'Customercontroller@edit_customerpassword');

Route::get('/courses', 'Coursescontroller@index');

Route::post('/addcourses', 'Coursescontroller@addcourses');

Route::get('/edit_courses/{id}', 'Coursescontroller@edit_courses');

Route::post('/post_edit_courses', 'Coursescontroller@post_edit_courses');

Route::get('/status_changecourses/{id}', 'Coursescontroller@status_changecourses');

Route::get('/delete_courses/{id}', 'Coursescontroller@delete_courses');

Route::get('/load_courses_gallery/{id}', 'Coursescontroller@loadgallery');

Route::post('/upload_courses_gallery', 'Coursescontroller@uploadgallery');

Route::get('/tour', 'Tourcontroller@index');

Route::get('/addtour', 'Tourcontroller@add_tour');

Route::post('/addtour', 'Tourcontroller@addtour');

Route::get('/status_changetour/{id}', 'Tourcontroller@status_changetour');

Route::get('/delete_tour/{id}', 'Tourcontroller@delete_tour');

Route::get('/edit_tour/{id}', 'Tourcontroller@edit_tour');

Route::post('/post_edit_tour', 'Tourcontroller@post_edit_tour');

Route::get('/tour_request', 'Tourcontroller@tour_request');

Route::get('/boat', 'Boatcontroller@index');

Route::get('/add_boat', 'Boatcontroller@add_boat');

Route::post('/addboat', 'Boatcontroller@addboat');

Route::get('/load_boat_gallery/{id}', 'Boatcontroller@loadgallery');

Route::post('/upload_boat_gallery', 'Boatcontroller@uploadgallery');

Route::get('/status_change_boat/{id}', 'Boatcontroller@status_changeboat');

Route::get('/delete_boat/{id}', 'Boatcontroller@delete_boat');

Route::get('/edit_boat/{id}', 'Boatcontroller@edit_boat');

Route::post('/post_edit_boat', 'Boatcontroller@post_edit_boat');

Route::post('/post_edit_gallery', 'Boatcontroller@post_edit_gallery');

Route::get('/classes', 'Classescontroller@index');

Route::post('/addclasses', 'Classescontroller@addclasses');

Route::post('/getlocation', 'Classescontroller@getlocation');

Route::get('/status_changeclasses/{id}', 'Classescontroller@status_changecourses');

Route::get('/edit_classes/{id}', 'Classescontroller@edit_classes');

Route::post('/post_edit_classes', 'Classescontroller@post_edit_classes');

Route::get('/delete_classes/{id}', 'Classescontroller@delete_classes');

Route::get('/get_request', 'Classescontroller@get_request');

Route::get('/status_changerequst/{id}', 'Classescontroller@status_changerequst');

Route::get('/add_banner', 'Homecontroller@banner');

Route::post('/upload_banner', 'Homecontroller@upload_banner');

Route::get('/banner', 'Homecontroller@view_banner');

Route::get('/delete_banner/{id}', 'Homecontroller@delete_banner');

Route::get('/edit_banner/{id}', 'Homecontroller@edit_banner');

Route::post('/post_edit_banner', 'Homecontroller@post_edit_banner');

Route::get('/add_client', 'Homecontroller@add_client');

Route::post('/upload_our_client', 'Homecontroller@upload_client');

Route::get('/delete_client/{id}', 'Homecontroller@delete_client');

Route::get('/advertisement', 'Homecontroller@view_advertisement');

Route::get('/add_advertisement', 'Homecontroller@add_advertisement');

Route::post('/add_advertisement', 'Homecontroller@post_advertisement');

Route::get('/delete_adver/{id}', 'Homecontroller@delete_adver');

Route::get('/status_advert/{id}', 'Homecontroller@status_advert');

Route::get('/edit_advertisement/{id}', 'Homecontroller@edit_advertisement');

Route::post('/post_edit_advertisement', 'Homecontroller@post_edit_advertisement');

Route::get('/web_content', 'Homecontroller@web_content');

Route::post('/get_content', 'Homecontroller@get_content');

Route::post('/post_content', 'Homecontroller@post_content');

Route::get('/store', 'Homecontroller@store');

Route::get('/add_store', 'Homecontroller@add_store');

Route::post('/add_store', 'Homecontroller@post_add_store');

Route::get('/status_store/{id}', 'Homecontroller@status_store');

Route::get('/delete_store/{id}', 'Homecontroller@delete_store');

Route::get('/edit_store/{id}', 'Homecontroller@edit_store');

Route::post('/edit_store', 'Homecontroller@post_edit_store');

Route::get('/our_team', 'Homecontroller@team');

Route::get('/add_team', 'Homecontroller@add_team');

Route::post('/add_team', 'Homecontroller@post_add_team');

Route::get('/status_team/{id}', 'Homecontroller@status_team');

Route::get('/delete_team/{id}', 'Homecontroller@delete_team');

Route::get('/edit_team/{id}', 'Homecontroller@edit_team');

Route::post('/edit_team', 'Homecontroller@post_edit_team');

Route::get('/add_gallery', 'Homecontroller@add_gallery');

Route::post('/upload_gallery', 'Homecontroller@upload_gallery');

Route::get('/delete_gallery/{id}', 'Homecontroller@delete_gallery');

Route::get('/benefit', 'Membershipcontroller@index');

Route::post('/benefit', 'Membershipcontroller@create');

Route::get('/edit_benefit/{id}', 'Membershipcontroller@edit_benefit');

Route::post('/edit_benefit', 'Membershipcontroller@post_edit_benefit');

Route::get('/delete_benefit/{id}', 'Membershipcontroller@delete_benefit');

Route::get('/packages', 'Membershipcontroller@packages');

Route::post('/packages', 'Membershipcontroller@post_packages');

Route::get('/edit_packages/{id}', 'Membershipcontroller@edit_packages');

Route::post('/edit_packages', 'Membershipcontroller@post_edit_packages');

Route::get('/view_subscribe', 'Homecontroller@view_subscribe');

Route::get('/delete_subscribe/{id}', 'Homecontroller@delete_subscribe');

Route::get('/contactUs-list', 'Homecontroller@contactUslist');

//Route::get('/delete_subscribe/{id}','Homecontroller@delete_subscribe');

Route::get('/certification', 'Homecontroller@certification');

Route::post('/certification', 'Homecontroller@post_certification');

Route::get('/delete_certification/{id}', 'Homecontroller@delete_certification');

/***************************Tranner*******************************************************/

Route::get('/my_classes', 'Trannercontroller@index');

Route::get('/accessories', 'Trannercontroller@accessories');

Route::post('/request_accessories', 'Trannercontroller@request_accessories');

Route::post('/showmyclass', 'Trannercontroller@showmyclass');

Route::get('/tranner_status/{id}/{value}', 'Trannercontroller@tranner_status');

/***************************WEBSITE*******************************************************/

Route::get('/hhhh', 'App\Http\Controllers\Webcontroller@index');

Route::post('/users_login', 'Loginusercontroller@do_login');

Route::get('/userlogout', 'Webcontroller@userlogout');

Route::get('login/google', 'Loginusercontroller@redirectToProvider');

Route::get('login/google/callback', 'Loginusercontroller@handleProviderCallback');

Route::get('/login/facebook', 'Loginusercontroller@redirectToProviderfacebook');

Route::get('/login/facebook/callback', 'Loginusercontroller@handleProviderCallbackfacebook');

Route::group(['middleware' => ['customer']], function () {

});

Route::get('/product_detail/{id}', 'Webcontroller@product_detail');
Route::get('/registration', 'Webcontroller@registration');
Route::post('/post_registration', 'Webcontroller@post_registration');
Route::get('/product_listing', 'Productlistcontroller@index');
Route::get('/product_listing', 'Productlistcontroller@index');
Route::get('/cart', 'Cartcontroller@index');
Route::post('/add_cart', 'Cartcontroller@addcart');
Route::get('/contact_us', 'Webcontroller@contact_us');
Route::post('/contact_us', 'Webcontroller@post_contact_us');
Route::get('/courses_list', 'Courseslistcontroller@index');
Route::get('/courses_detail/{id}', 'Courseslistcontroller@courses_detail');
Route::post('/courses_booking', 'Courseslistcontroller@courses_booking');
Route::post('/post_review', 'Courseslistcontroller@reviews');
Route::get('/tour_list', 'Tourlistcontroller@index');
Route::get('/tour_detail/{id}', 'Tourlistcontroller@tour_detail');
Route::post('/tour_booking', 'Tourlistcontroller@tour_booking');
Route::post('/tour_inquery', 'Tourlistcontroller@tour_inquery');
Route::get('/delete_cart/{id}', 'Cartcontroller@delete_cart');
Route::post('/check_out', 'Cartcontroller@check_out');
Route::post('/getmembership', 'Cartcontroller@get_membership');
Route::get('/mambership_status', 'Cartcontroller@mambership_status');
Route::post('/mambership_status', 'Cartcontroller@plan_status');
Route::post('/checkcoupan', 'Cartcontroller@checkcoupan');
Route::get('/payment_status', 'Cartcontroller@payment_status');
Route::get('/success', 'Cartcontroller@success');
Route::get('/failed', 'Cartcontroller@failed');
Route::post('/updatecart', 'Cartcontroller@updatecart');
Route::post('/search_courses', 'Courseslistcontroller@search');
Route::post('/search_tour', 'Tourlistcontroller@search');
Route::post('/search_product', 'Productlistcontroller@search');
Route::get('/team', 'Webcontroller@ourteam');
Route::get('/addfav/{id}', 'Webcontroller@addfav');
Route::get('/addfav_course/{id}', 'Webcontroller@addfav_course');
Route::get('/forgot_password', 'Forgotcontroller@forgot_password');
Route::post('/forgot_password', 'Forgotcontroller@send_emil');
Route::get('/rest_password/{code}', 'Forgotcontroller@rest_password');
Route::post('/post_rest_password', 'Forgotcontroller@post_rest_password');
Route::get('/boat_list', 'Boatlistcontroller@index');
Route::post('/book_boat', 'Boatlistcontroller@book_boat');
Route::get('/boat_detail/{id}', 'Boatlistcontroller@boat_detail');
Route::get('/my_account', 'Webcontroller@my_account');
Route::post('/my_account', 'Webcontroller@update_my_account');
Route::get('/change_password', 'Webcontroller@change_password');
Route::post('/change_password', 'Webcontroller@post_change_password');
Route::get('/my_wish_list', 'Webcontroller@my_wish_list');
Route::get('/delete_wishlist/{id}', 'Webcontroller@delete_wishlist');
Route::get('/my_order', 'Webcontroller@my_order');
Route::get('/about_us', 'Webcontroller@about_us');

// Route::get('/gallery','Webcontroller@gallery');

Route::get('/membership_plan', 'Webcontroller@membership_plan');
Route::get('/terms', 'Webcontroller@terms');
Route::get('/privacy_policy', 'Webcontroller@privacy_policy');
Route::get('/return_policy', 'Webcontroller@return_policy');
Route::post('/subscribe', 'Webcontroller@subscribe');
Route::get('/search_tours/{id}', 'Tourlistcontroller@search_tours');
Route::get('/search_rent', 'Productlistcontroller@search_rent');
Route::post('/purchase_courses', 'Paymentcontroller@purchasecorse');
Route::get('/horoscope_list', 'App\Http\Controllers\HoroscopeController@horoscope_list');
Route::get('/horoscope_details/{star}', 'App\Http\Controllers\HoroscopeController@horoscope_details');