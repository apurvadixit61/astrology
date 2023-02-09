<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sendNotification','App\Http\Controllers\Apicontroller@sendNotification');

Route::post('logoutUpdate','App\Http\Controllers\Apicontroller@logoutUpdate');
Route::post('astro_review','App\Http\Controllers\Apicontroller@astro_review');

Route::post('astro_review_list','App\Http\Controllers\Apicontroller@astro_review_list');
Route::post('astro_rating_calc','App\Http\Controllers\Apicontroller@astro_rating_calc');


Route::get('live_events','App\Http\Controllers\Apicontroller@live_events');
Route::get('view_redmi','App\Http\Controllers\Apicontroller@view_redmi');

Route::post('astro_gallery','App\Http\Controllers\Apicontroller@astro_gallery');

Route::post('add_remedy','App\Http\Controllers\Apicontroller@add_remedy');
Route::post('redmy_list','App\Http\Controllers\Apicontroller@redmy_list');
Route::post('call_by_kundali','App\Http\Controllers\Apicontroller@call_by_kundali');

Route::get('client_testimonial','App\Http\Controllers\Apicontroller@client_testimonial');
Route::get('astro_news','App\Http\Controllers\Apicontroller@astro_news');

Route::post('buy_plan','App\Http\Controllers\Apicontroller@buy_plan');
Route::post('view_user_buy_plan','App\Http\Controllers\Apicontroller@view_user_buy_plan');
Route::post('add_kundli','App\Http\Controllers\Apicontroller@add_kundli');
Route::post('view_kundli','App\Http\Controllers\Apicontroller@view_kundli');
Route::post('view_plan','App\Http\Controllers\Apicontroller@view_plan');
Route::post('call_check','App\Http\Controllers\Apicontroller@call_check');
Route::post('add_call_chat','App\Http\Controllers\Apicontroller@add_call_chat');
Route::post('view_call_chat','App\Http\Controllers\Apicontroller@view_call_chat');

Route::post('login_user','App\Http\Controllers\Apicontroller@login');
Route::post('check_exsists','App\Http\Controllers\Apicontroller@check_exsists');
Route::post('otp_mobile_verify','App\Http\Controllers\Apicontroller@otp_mobile_verify');
Route::post('add_wallet_amt','App\Http\Controllers\Apicontroller@add_wallet_amt');
Route::post('view_wallet_bal','App\Http\Controllers\Apicontroller@view_wallet_bal');
Route::post('view_users','App\Http\Controllers\Apicontroller@view_users');
Route::post('view_notfication','App\Http\Controllers\Apicontroller@view_notfication');
Route::post('view_orders','App\Http\Controllers\Apicontroller@view_orders');
Route::post('add_orders','App\Http\Controllers\Apicontroller@add_orders');
Route::post('feedback','App\Http\Controllers\Apicontroller@feedback');
Route::post('otp_verify','App\Http\Controllers\Apicontroller@otp_verify');
Route::post('sendmeail','App\Http\Controllers\Apicontroller@sendmeail');
Route::post('logout_user','App\Http\Controllers\Apicontroller@logout');
Route::post('astrologer_list','App\Http\Controllers\Apicontroller@astrologer_list');
Route::post('reset_password','App\Http\Controllers\Apicontroller@reset_password');
// Route::post('password/email','App\Http\Controllers\Apicontroller@forget');
Route::post('forgot', 'App\Http\Controllers\Apicontroller@forgot');
Route::post('password/reset', 'App\Http\Controllers\ForgotPasswordController@reset');

Route::post('registration','App\Http\Controllers\Apicontroller@registration');
Route::post('edit_user','App\Http\Controllers\Apicontroller@edit_user');
Route::post('add_product','App\Http\Controllers\Apicontroller@add_product');
Route::post('edit_product','App\Http\Controllers\Apicontroller@edit_product');
Route::post('delete_product','App\Http\Controllers\Apicontroller@delete_product');
Route::post('product_info','App\Http\Controllers\Apicontroller@product_info');
Route::post('comp_profile','App\Http\Controllers\Apicontroller@company_profile');
Route::post('get_user_list','App\Http\Controllers\Apicontroller@user_list');
Route::post('get_company_list','App\Http\Controllers\Apicontroller@company_list');
Route::post('get_company_details','App\Http\Controllers\Apicontroller@user_details');
Route::post('get_company_category_list','App\Http\Controllers\Apicontroller@company_category_list');//mai acticvity
Route::post('get_company_subcategory_list','App\Http\Controllers\Apicontroller@company_subcategory_list');//sub activity
Route::post('get_product_list','App\Http\Controllers\Apicontroller@product_list');
Route::post('get_category_products','App\Http\Controllers\Apicontroller@category_products');

Route::post('post','App\Http\Controllers\Apicontroller@post');
Route::post('live_feed','App\Http\Controllers\Apicontroller@live_feed');
Route::post('delete_live_feed','App\Http\Controllers\Apicontroller@delete_live_feed');
Route::post('chating','App\Http\Controllers\Apicontroller@messages');
Route::post('get_chat_list','App\Http\Controllers\Apicontroller@allchat_data');
Route::post('get_userchat_list','App\Http\Controllers\Apicontroller@userchat_data');
Route::post('getNewInProduct','App\Http\Controllers\Apicontroller@getNewInProduct');
Route::post('collapp_list','App\Http\Controllers\Apicontroller@collapp_list');

Route::post('add_service','App\Http\Controllers\Apicontroller@add_service');
Route::post('edit_service','App\Http\Controllers\Apicontroller@edit_service');
Route::post('delete_service','App\Http\Controllers\Apicontroller@delete_service');
Route::post('get_service_list','App\Http\Controllers\Apicontroller@service_list');
Route::post('add_category','App\Http\Controllers\Apicontroller@add_category');
Route::post('categorylist','App\Http\Controllers\Apicontroller@categorylist');
Route::post('add_subcategory','App\Http\Controllers\Apicontroller@add_subcategory');
Route::post('get_subcategory_products','App\Http\Controllers\Apicontroller@subcategory_list');


Route::post('post_like','App\Http\Controllers\Apicontroller@post_like');
Route::post('post_comment','App\Http\Controllers\Apicontroller@post_comment');

Route::post('follow','App\Http\Controllers\Apicontroller@post_follow');

Route::post('get_country_list','App\Http\Controllers\Apicontroller@country');
Route::post('get_state_list','App\Http\Controllers\Apicontroller@state');
Route::post('get_city_list','App\Http\Controllers\Apicontroller@city');

Route::post('filter','App\Http\Controllers\Apicontroller@filter');
Route::post('business_list','App\Http\Controllers\Apicontroller@business_list');
Route::post('call_back','App\Http\Controllers\Apicontroller@call_back');
Route::post('call_history','App\Http\Controllers\Apicontroller@call_history');
Route::post('user_chatlist','App\Http\Controllers\Apicontroller@user_chatlist');
Route::post('isLoginUsingOtp','App\Http\Controllers\Apicontroller@isLoginUsingOtp');
Route::post('updateKundaliImage','App\Http\Controllers\Apicontroller@updateKundaliImage');

Route::post('get_banner_images','App\Http\Controllers\Apicontroller@get_banner_images');

Route::get('astro_tips','App\Http\Controllers\Apicontroller@astro_tips');
Route::get('view_all_category','App\Http\Controllers\Apicontroller@view_all_category');
Route::post('astro_registration','App\Http\Controllers\Apicontroller@astro_registration');

Route::post('wallet_amount_deduct','App\Http\Controllers\Apicontroller@wallet_amount_deduct');
Route::post('update_read_status','App\Http\Controllers\Apicontroller@update_read_status');
Route::post('call_in_queue_save','App\Http\Controllers\Apicontroller@call_in_queue_save');
Route::post('get_call_status','App\Http\Controllers\Apicontroller@get_call_status');
Route::post('chat_status_update ','App\Http\Controllers\Apicontroller@chat_status_update');
Route::post('get_chat_status','App\Http\Controllers\Apicontroller@get_chat_status');
