<?php

use App\Http\Controllers\Frontend\CustomerController;
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

Route::group(['namespace'=>'Frontend'],function(){
    Route::get('/','FrontendController@home');
    Route::get('/thuc-don.html','FrontendController@menu');
    Route::get('/gioi-thieu.html','FrontendController@about');
    Route::get('/lien-he.html','FrontendController@contact');
    Route::get('/bai-viet.html','FrontendController@blog');
    Route::post('gui-lien-he','FrontendController@gui_lien_he');
    Route::get('/bai-viet/chi-tiet-bai/{bl_id}.html','FrontendController@chi_tiet_bai_viet');
    Route::get('/gioi-thieu/gioi-thieu-chi-tiet/{hi_id}.html','FrontendController@gioi_thieu_chi_tiet');
    Route::get('/danh-muc-san-pham/{cate_id}.html','FrontendController@danh_muc_san_pham');
    Route::get('/thuc-don/chi-tiet-san-pham/{pr_id}.html','FrontendController@chi_tiet_san_pham');
    Route::post('insert-rating','FrontendController@insert_rating');
    Route::post('/bai-viet/chi-tiet-bai/{bl_id}.html','FrontendController@post_comment_blog');
    Route::get('/danh-muc-bai-viet/{ca_id}.html','FrontendController@danh_muc_bai_viet');
    Route::get('/huong-dan-mua-hang.html','FrontendController@huong_dan_mua_hang');
    Route::get('/dieu-khoan.html','FrontendController@dieu_khoan');
    Route::get('/chinh-sach-khuyen-mai.html','FrontendController@chinh_sach_khuyen_mai');
    Route::get('/huong-dan-su-dung.html','FrontendController@huong_dan_su_dung'); 
//Cart
    Route::group(['prefix'=>'cart'],function(){
        Route::get('/gio-hang.html','CartController@cart');
        Route::post('/add-cart','CartController@add_cart');
        Route::get('/delete-cart/{session_id}','CartController@delete_cart');
        Route::get('/delete-all','CartController@delete_all');
        Route::post('update-cart','CartController@update_cart');
        Route::post('/check-coupon','CartController@check_coupon');
        Route::get('/delete-coupon','CartController@delete_coupon');
    });
//Customer
    Route::group(['prefix'=>'nguoi-dung'],function(){
        Route::get('/dang-ky.html','CustomerController@dang_ky');
        Route::get('/dang-nhap.html','CustomerController@dang_nhap');
        Route::post('/dang-ky-tai-khoan.html','CustomerController@dang_ky_tai_khoan');
        Route::post('/check-dang-nhap.html','CustomerController@check_dang_nhap');
        Route::get('/tai-khoan.html','CustomerController@tai_khoan');
        Route::get('/dang-xuat.html','CustomerController@dang_xuat');
        Route::get('/thanh-toan.html','CustomerController@thanh_toan');
        Route::post('/select-delivery.html','CustomerController@select_delivery');
        Route::post('/calculate-free','CustomerController@calculate_free');
        Route::get('/delete-free','CustomerController@delete_free');
        Route::post('/confirm-order','CustomerController@confirm_order');
        Route::get('/lich-su.html','CustomerController@lich_su');
        Route::get('/thong-tin.html','CustomerController@thong_tin');
        Route::post('/luu.html','CustomerController@luu');
        Route::get('chi-tiet-lich-su/{order_code}.html','CustomerController@chi_tiet');
        Route::get('/order/delete/{order_code}','CustomerController@delete');
        Route::get('/mat-khau.html','CustomerController@mat_khau');
        Route::post('/check-mat-khau.html','CustomerController@check_mat_khau');
        Route::post('/luu-mat-khau.html','CustomerController@password');
    });
});


Route::group(['namespace'=>'Backend'],function(){
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/','LoginController@getlogin');
        Route::post('/check-login','LoginController@postlogin');
        Route::get('/logout','LoginController@logout');
    //Index
        Route::get('comment','HomeController@Comment');
        Route::get('follow','HomeController@Follow');
        Route::post('fiter-by-date','HomeController@fiter_by_date');
        Route::post('dashboard-filter','HomeController@dashboard_filter');
        Route::post('days-order','HomeController@days_order');
        Route::get('/home','HomeController@gethome');
        Route::get('/search','HomeController@getsearch');

    //Authentic
        Route::get('/register-auth','LoginController@register_auth');
        Route::post('/register','LoginController@register');
        Route::get('login-auth','LoginController@login_auth');
        Route::post('login','LoginController@login');
        Route::get('/logout-auth','LoginController@logout_auth');
        Route::get('/user','LoginController@index');
        Route::post('/assign-role','LoginController@assign_role');
        
        Route::group(['prefix'=>'user'],function(){
            Route::get('/delete/{ad_id}','LoginController@delete')->middleware('auth.roles');
            Route::get('/impersonate/{ad_id}','LoginController@impersonate');
            Route::get('/impersonate-detroy','LoginController@impersonate_detroy');
        });
    //History
        Route::group(['prefix'=>'history'],function(){
            Route::get('/','HistoryController@get_history');
            Route::get('/add-history','HistoryController@add_history')->middleware('auth.roles');
            Route::get('/edit/{hi_id}','HistoryController@edit_history')->middleware('auth.roles');
            Route::get('/delete/{hi_id}','HistoryController@delete')->middleware('auth.roles');
            Route::post('/save-history','HistoryController@save_history')->middleware('auth.roles');
            Route::get('/active/{hi_id}','HistoryController@active')->middleware('auth.roles');
            Route::get('/actived/{hi_id}','HistoryController@actived')->middleware('auth.roles');
            Route::post('/update-history/{hi_id}','HistoryController@update_history')->middleware('auth.roles');
        });
    //Agent
        Route::group(['prefix'=>'agent'],function(){
            Route::get('/','AgentController@get_agent');
            Route::get('/add-agent','AgentController@add_agent')->middleware('auth.roles');
            Route::get('/edit/{ag_id}','AgentController@edit_agent')->middleware('auth.roles');
            Route::get('/delete/{ag_id}','AgentController@delete')->middleware('auth.roles');
            Route::post('/save-agent','AgentController@save_agent')->middleware('auth.roles');
            Route::get('/active/{ag_id}','AgentController@active')->middleware('auth.roles');
            Route::get('/actived/{ag_id}','AgentController@actived')->middleware('auth.roles');
            Route::post('/update-agent/{ag_id}','AgentController@update_agent')->middleware('auth.roles');
        });
    //Blog
        Route::group(['prefix'=>'blog'],function(){
            Route::get('/','BlogController@get_blog');
            Route::get('/add-blog','BlogController@add_blog')->middleware('auth.roles');
            Route::get('/edit/{bl_id}','BlogController@edit_blog')->middleware('auth.roles');
            Route::get('/delete/{bl_id}','BlogController@delete')->middleware('auth.roles');
            Route::post('/save-blog','BlogController@save_blog')->middleware('auth.roles');
            Route::get('/active/{bl_id}','BlogController@active')->middleware('auth.roles');
            Route::get('/actived/{bl_id}','BlogController@actived')->middleware('auth.roles');
            Route::post('/update-blog/{bl_id}','BlogController@update_blog')->middleware('auth.roles');
        });
    //FeedBack
        Route::group(['prefix'=>'feedback'],function(){
            Route::get('/','FeedBackController@get_feedback')->middleware('auth.roles');
            Route::get('/add-feedback','FeedBackController@add_feedback')->middleware('auth.roles');
            Route::get('/edit/{fe_id}','FeedBackController@edit_feedback')->middleware('auth.roles');
            Route::get('/delete/{fe_id}','FeedBackController@delete')->middleware('auth.roles');
            Route::post('/save-feedback','FeedBackController@save_feedback')->middleware('auth.roles');
            Route::get('/active/{fe_id}','FeedBackController@active')->middleware('auth.roles');
            Route::get('/actived/{fe_id}','FeedBackController@actived')->middleware('auth.roles');
            Route::post('/update-feedback/{fe_id}','FeedBackController@update_feedback')->middleware('auth.roles');
        });
    //Slide
        Route::group(['prefix'=>'slide'],function(){
            Route::get('/','SlideController@get_slide');
            Route::get('/add-slide','SlideController@add_slide')->middleware('auth.roles');
            Route::get('/edit/{sl_id}','SlideController@edit_slide')->middleware('auth.roles');
            Route::get('/delete/{sl_id}','SlideController@delete')->middleware('auth.roles');
            Route::post('/save-slide','SlideController@save_slide')->middleware('auth.roles');
            Route::get('/active/{sl_id}','SlideController@active')->middleware('auth.roles');
            Route::get('/actived/{sl_id}','SlideController@actived')->middleware('auth.roles');
            Route::post('/update-slide/{sl_id}','SlideController@update_slide')->middleware('auth.roles');
        });
    //Contact
        Route::group(['prefix'=>'contact'],function(){
            Route::get('/','ContactController@get_contact');
            Route::get('/delete/{ct_id}','ContactController@delete')->middleware('auth.roles');
            Route::get('/edit/{ct_id}','ContactController@edit_contact')->middleware('auth.roles');
        });
    //coupon
        Route::group(['prefix'=>'coupon'],function(){
            Route::get('/add-coupon','CouponController@add_coupon')->middleware('auth.roles');
            Route::get('/','CouponController@all_coupon');
            Route::get('/edit/{con_id}','CouponController@edit_coupon')->middleware('auth.roles');
            Route::get('/delete/{con_id}','CouponController@delete_coupon')->middleware('auth.roles');
            Route::post('/save-coupon','CouponController@save_coupon')->middleware('auth.roles');
            Route::post('/update-coupon/{con_id}','CouponController@update_coupon')->middleware('auth.roles');           
        });
    //Category
        Route::group(['prefix'=>'category'],function(){
            Route::get('/','CategoryController@getCate')->middleware('auth.roles');
            Route::post('/','CategoryController@postCate')->middleware('auth.roles');
            Route::get('edit/{id}','CategoryController@getEditCate')->middleware('auth.roles');
            Route::post('edit/{id}','CategoryController@postEditCate')->middleware('auth.roles');
            Route::get('delete/{id}','CategoryController@getDeleteCate')->middleware('auth.roles');
            Route::post('/update-category/{cate_id}','CategoryController@save_category')->middleware('auth.roles');

        });
    //Product
        Route::group(['prefix'=>'product'],function(){
            Route::get('/','ProductController@get_product');
            Route::get('/add-product','ProductController@add_product');
            Route::get('/edit/{pr_id}','ProductController@edit_product');
            Route::get('/delete/{pr_id}','ProductController@delete');
            Route::post('/save-product','ProductController@save_product');
            Route::get('/active/{pr_id}','ProductController@active');
            Route::get('/actived/{pr_id}','ProductController@actived');
            Route::post('/update-product/{pr_id}','ProductController@update_product');
            Route::get('/select-pictrue/{pr_id}','ProductController@select_picture');
            Route::post('/save-picture/{pr_id}','ProductController@save_picture');
        });
    //Delivery
        Route::group(['prefix'=>'delivery'],function(){
            Route::get('/','DeliveryController@delivery');
            Route::post('/select-delivery','DeliveryController@select_delivery');
            Route::post('/insert-delivery','DeliveryController@insert_delivery');
            Route::post('/select-freeship','DeliveryController@select_freeship');
            Route::post('/update-delivery','DeliveryController@update_delivery');

        });
    //Order
        Route::group(['prefix'=>'order'],function(){
            Route::get('/','OrderController@all_order');
            Route::get('/view-order/{order_code}','OrderController@view_order');
            Route::get('/print-order/{checkout_code}','OrderController@print_order');
            Route::post('/update-order-qty','OrderController@update_order_qty');
            Route::post('/update-quantity','OrderController@update_quantity');
            Route::get('/delete/{order_code}','OrderController@delete_order');
            Route::get('/print-order/{checkout_code}','OrderController@print_order');
        });
    //Brand
        Route::group(['prefix'=>'brand'],function(){
            Route::get('/','BrandController@get_brand');
            Route::get('/add-brand','BrandController@add_brand')->middleware('auth.roles');
            Route::get('/edit/{bra_id}','BrandController@edit_brand')->middleware('auth.roles');
            Route::get('/delete/{bra_id}','BrandController@delete')->middleware('auth.roles');
            Route::post('/save-brand','BrandController@save_brand')->middleware('auth.roles');
            Route::get('/active/{bra_id}','BrandController@active')->middleware('auth.roles');
            Route::get('/actived/{bra_id}','BrandController@actived')->middleware('auth.roles');
            Route::post('/update-brand/{bra_id}','BrandController@update_brand')->middleware('auth.roles');
        });
    //Extra
        Route::group(['prefix'=>'extra'],function(){
            Route::get('/','ExtraController@get_extra');
            Route::get('/add-extra','ExtraController@add_extra')->middleware('auth.roles');
            Route::get('/edit/{ex_id}','ExtraController@edit_extra')->middleware('auth.roles');
            Route::get('/delete/{ex_id}','ExtraController@delete')->middleware('auth.roles');
            Route::post('/save-extra','ExtraController@save_extra')->middleware('auth.roles');
            Route::post('/update-extra/{ex_id}','ExtraController@update_extra')->middleware('auth.roles');
        });
    //Rim
        Route::group(['prefix'=>'rim'],function(){
            Route::get('/','RimController@get_rim');
            Route::get('/add-rim','RimController@add_rim')->middleware('auth.roles');
            Route::get('/edit/{ri_id}','RimController@edit_rim')->middleware('auth.roles');
            Route::get('/delete/{ri_id}','RimController@delete')->middleware('auth.roles');
            Route::post('/save-rim','RimController@save_rim')->middleware('auth.roles');
            Route::get('/active/{ri_id}','RimController@active')->middleware('auth.roles');
            Route::get('/actived/{ri_id}','RimController@actived')->middleware('auth.roles'); 
            Route::post('/update-rim/{ri_id}','RimController@update_rim')->middleware('auth.roles');
        });
    //Cate
        Route::group(['prefix'=>'cate'],function(){
            Route::get('/','CateController@getCate')->middleware('auth.roles');
            Route::post('/','CateController@postCate')->middleware('auth.roles');
            Route::get('edit/{id}','CateController@getEditCate')->middleware('auth.roles');
            Route::post('edit/{id}','CateController@postEditCate')->middleware('auth.roles');
            Route::get('delete/{id}','CateController@getDeleteCate')->middleware('auth.roles');
            Route::post('/update-cate/{ca_id}','CateController@save_cate')->middleware('auth.roles');

        });
    });
});
    Route::group(['middleware'=>'auth.roles'],function(){
        Route::get('/admin/add-product','ProductController@add_product');
        Route::get('/admin/edit-product','ProductController@edit_product');
    });

