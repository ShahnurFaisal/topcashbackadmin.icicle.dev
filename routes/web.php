<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MerchantAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteConfigController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SubModuleController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantApproveController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CurrencyController;



//  Start FrontEnd Route

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['authAdmin']],function (){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    //Merchant Start
    Route::get('/merchant',[MerchantController::class,'merchant'])->name('merchant');
    Route::get('/edit-merchant/{id}',[MerchantController::class,'editMerchant'])->name('edit.merchant');
    Route::post('/update-merchant',[MerchantController::class,'updateMerchant'])->name('update.merchant');
    Route::get('/delete-merchant/{id}',[MerchantController::class,'deleteMerchant'])->name('delete.merchant');
    Route::get('/add-merchant',[MerchantController::class,'addMerchant'])->name('add.merchant');
    Route::post('/save-merchant',[MerchantController::class,'saveMerchant'])->name('save.merchant');
    // Merchant End
    // Merchant Approve By
    Route::get('/approve',[MerchantApproveController::class,'showApprove'])->name('showApprove');
    Route::get('approve/{imageId}/{status}',[MerchantApproveController::class,'approveOffer'])->name('approveOffer');
    // Merchant Approve End
    //Merchant Approve_update
    Route::get('/approveUpdate',[MerchantApproveController::class,'showApproveUpdate'])->name('showApproveUpdate');
    //Merchant Approve_update
        // Customer
    route::get('/customer',[CustomerController::class,'customer'])->name('customer');
    route::get('/edit-customer/{id}',[CustomerController::class,'editCustomer'])->name('edit.customer');
    route::post('/update-customer',[CustomerController::class,'updateCustomer'])->name('update.customer');
    route::get('/delete-customer/{id}',[CustomerController::class,'deleteCustomer'])->name('delete.customer');
    route::get('/pdf-customer',[CustomerController::class,'pdfCustomer'])->name('pdf.customer');
    route::get('/print-customer',[CustomerController::class,'printCustomer'])->name('print.customer');
    route::get('/excel-customer',[CustomerController::class,'excelCustomer'])->name('excel.customer');
    route::get('/csv-customer',[CustomerController::class,'csvCustomer'])->name('csv.customer');

    //Category Route
    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::post('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::get('/pdf-category',[CategoryController::class,'pdfCategory'])->name('pdf.category');

    //Sub Category Route
    Route::get('/subCategory',[SubCategoryController::class,'subCategory'])->name('subCategory');
    Route::post('/add-subCategory',[SubCategoryController::class,'storeSubCustomer'])->name('add.subCategory');
    Route::get('/edit-subCategory/{id}',[SubCategoryController::class,'editSubCategory'])->name('edit.subCategory');
    Route::get('/delete.subCategory/{id}',[SubCategoryController::class,'deleteSubCategory'])->name('delete.subCategory');
    Route::get('/pdf-subCategory',[SubCategoryController::class,'pdfSubCategory'])->name('pdf.subCategory');


    // childCategory route
    Route::get('/childCategory',[ChildCategoryController::class,'childCategory'])->name('childCategory');
    Route::post('/add-childCategory',[ChildCategoryController::class,'storeChildCategory'])->name('add.childCategory');
    Route::get('/delete-childCategory/{id}',[ChildCategoryController::class,'deleteChildCategory'])->name('delete-childCategory');
    Route::get('/pdf-childCategory',[ChildCategoryController::class,'pdfChildCategory'])->name('pdf.childCategory');

    // Offer Route
    route::get('/offer',[OfferController::class,'offer'])->name('offer');
    route::get('/add-offer',[OfferController::class,'addOffer'])->name('add.offer');
    route::post('/save-offer',[OfferController::class,'saveOffer'])->name('save.offer');
    route::get('/delete-offer/{id}',[OfferController::class,'deleteOffer'])->name('delete.offer');
    route::get('/edit-offer/{id}',[OfferController::class,'editOffer'])->name('edit.offer');
    route::post('/update-offer',[OfferController::class,'updateOffer'])->name('update.offer');
    route::get('/pdf-product',[OfferController::class,'pdfProduct'])->name('pdf.product');
    //location
    Route::get('/convert-address-to-coordinates', 'LocationsController@convertAddressToCoordinates');
    Route::post('/find-nearest-offer', 'LocationsController@findNearestOffer');

    //
    // //QR code
    Route::get('/generate_qr_code', [QRCodeController::class, 'showQRCodeGenerator'])->name('generate_qr_code');
    Route::post('/generate_qr_code', [QRCodeController::class, 'generateAndSendQRCode'])->name('generate_qr_code.post');
    Route::post('/generate_qr_code_decline', [QRCodeController::class, 'generateAndSendDeclineQRCode'])->name('generate_qr_code_decline.post');

    // Order Route
    Route::get('/order',[OrderController::class,'order'])->name('order');
    Route::get('/delete-order/{id}',[OrderController::class,'deleteOrder'])->name('delete.order');
    Route::get('/edit-order/{id}',[OrderController::class,'editOrder'])->name('edit.order');
    Route::post('/update-order',[OrderController::class,'updateOrder'])->name('update.order');
    Route::get('/pdf-order',[OrderController::class,'pdfOrder'])->name('pdf.order');

    // Inventory Route
    Route::get('/inventory',[InventoryController::class,'inventory'])->name('inventory');
    Route::get('/add-inventory',[InventoryController::class,'addInventory'])->name('add.inventory');
    Route::get('/pdf-inventory',[InventoryController::class,'pdfInventory'])->name('pdf.inventory');
    Route::post('/save-inventory',[InventoryController::class,'saveInventory'])->name('save.inventory');
    Route::get('/edit-inventory/{id}',[InventoryController::class,'editInventory'])->name('edit.inventory');
    Route::post('/update-inventory',[InventoryController::class,'updateInventory'])->name('update.inventory');
    Route::get('/delete-inventory/{id}',[InventoryController::class,'deleteInventory'])->name('delete.inventory');
    // Site Configuration
    //site info
    Route::get('/site-info',[SiteConfigController::class,'siteInfo'])->name('site.info');
    Route::post('/site-info',[SiteConfigController::class,'siteInfoPost'])->name('site.info.post');
    //Slider
    Route::get('/slider',[SliderController::class,'slider'])->name('slider');
    Route::get('/add-slider',[SliderController::class,'addSlider'])->name('add.slider');
    Route::post('/store-slider',[SliderController::class,'storeSlider'])->name('store.slider');
    Route::get('/edit-slider/{id}',[SliderController::class,'editSlider'])->name('edit.slider');
    Route::post('/update-slider',[SliderController::class,'updateSlider'])->name('update.slider');
    Route::get('/delete-slider/{id}',[SliderController::class,'deleteSlider'])->name('delete.slider');
    //banner
    Route::get('/banner',[BannerController::class,'banner'])->name('banner');
    Route::get('/add-banner',[BannerController::class,'addBanner'])->name('add.banner');
    Route::post('/store-banner',[BannerController::class,'storeBanner'])->name('store.banner');
    Route::get('/edit-banner/{id}',[BannerController::class,'editBanner'])->name('edit.banner');
    Route::get('/delete.banner/{id}',[BannerController::class,'deleteBanner'])->name('delete.banner');
    Route::post('/update-banner',[BannerController::class,'updateBanner'])->name('update.banner');

    //role and permission
    // role route
    Route::get('/role',[RoleController::class,'role'])->name('role');
    Route::get('/add-role',[RoleController::class,'addRole'])->name('add.role');
    Route::post('/store-role',[RoleController::class,'storeRole'])->name('store.role');
    Route::get('/edit-role/{id}',[RoleController::class,'editRole'])->name('edit.role');
    Route::post('/update-role',[RoleController::class,'updateRole'])->name('update.role');
    Route::get('/delete-role/{id}',[RoleController::class,'deleteRole'])->name('delete.role');
    // module route
    Route::get('/module',[ModuleController::class,'module'])->name('module');
    Route::get('/add-module',[ModuleController::class,'addModule'])->name('add.module');
    Route::post('/store-module',[ModuleController::class,'storeModule'])->name('store.module');
    Route::get('/edit-module/{id}',[ModuleController::class,'editModule'])->name('edit.module');
    Route::post('/update-module',[ModuleController::class,'updateModule'])->name('update.module');
    Route::get('/delete-module/{id}',[ModuleController::class,'deleteModule'])->name('delete.module');
    // sub Module route
    Route::get('/subModule',[SubModuleController::class,'subModule'])->name('subModule');
    Route::get('/add-subModule',[SubModuleController::class,'addSubModule'])->name('add.subModule');
    Route::post('/store-subModule',[SubModuleController::class,'storeSubModule'])->name('store.subModule');
    Route::get('/edit-subModule/{id}',[SubModuleController::class,'editSubModule'])->name('edit.subModule');
    Route::post('/update-subModule',[SubModuleController::class,'updateSubModule'])->name('update.subModule');
    Route::get('/delete-subModule/{id}',[SubModuleController::class,'deleteSubModule'])->name('delete.subModule');
    //creating admin

    Route::get('/admin-list',[CreateAdminController::class,'adminList'])->name('adminList');
    Route::post('/admin-list',[CreateAdminController::class,'list'])->name('list');

    Route::get('/create-admin',[CreateAdminController::class,'createAdmin'])->name('create-admin');
    Route::post('/create-admin',[CreateAdminController::class,'adminCreate'])->name('adminCreate');

    Route::get('/edit-admin/{id}',[CreateAdminController::class,'showEditAdmin'])->name('showEditAdmin');
    Route::post('/edit-admin/{id}',[CreateAdminController::class,'editAdmin'])->name('editAdmin');

    Route::get('/delete-admin/{id}',[CreateAdminController::class,'deleteAdmin'])->name('deleteAdmin');
    // Location and offer route



    Route::get('find-near-location', [LocationController::class, 'index']);

    Route::get('/find-nearest-location/{latitude}/{longitude}', [LocationController::class, 'findNearestLocation']);
    Route::get('find-places', [LocationController::class, 'index']);

    // Language Route
    Route::get('/lang-home', [LangController::class, 'index']);
    Route::get('/lang-change', [LangController::class, 'change'])->name('changeLang');

    //Currency Route
    Route::resource('/currency', CurrencyController::class);

    Route::post('/currency_status',[CurrencyController::class,'currencyStatus'])->name('currency.status');

});

    //Admin Register
    Route::get('/register',[AdminAuthController::class,'showRegister'])->name('showRegister');
    Route::post('/register',[AdminAuthController::class,'register'])->name('admin.register');

    // Admin Register
    Route::get('/admin/register',[AdminAuthController::class,'adminRegister'])->name('showRegister');
    Route::post('/admin/register',[AdminAuthController::class,'register'])->name('admin.register');


    //Admin Login
    Route::redirect('/','/admin/login');
    Route::get('/admin/login',[AdminAuthController::class,'showLogin'])->name('showLogin');
    Route::post('/admin/login',[AdminAuthController::class,'login'])->name('admin.login');

    //Admin Login
    Route::redirect('/','/admin/login');
    Route::get('/admin/login',[AdminAuthController::class,'showLogin'])->name('showLogin');
    Route::post('/admin/login',[AdminAuthController::class,'login'])->name('admin.login');


    //Admin Logout
    Route::get('/admin/logout',[AdminAuthController::class,'logout'])->name('admin.logout');

    //Admin Password-reset
    Route::get('/password/forgot',[AdminAuthController::class,'showForgotForm'])->name('forgot.password.form');

    Route::post('/password/forgot',[AdminAuthController::class,'sendResetLink'])->name('forgot.password.link');

    Route::get('/password/reset/{token}',[AdminAuthController::class,'showResetForm'])->name('reset.password.form');

    Route::post('/password/reset',[AdminAuthController::class,'resetPassword'])->name('reset.password');




    Route::get('/roles', [PermissionController::class]);

    Route::group(['middleware' => 'role:user'], function() {
    //
    //    Route::get('/user', function() {
    //
    //        return 'Welcome...!!';
    //
    //    }


    });
