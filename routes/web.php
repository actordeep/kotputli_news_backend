<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\RoleController;



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

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('main.home');
});

Route::get('privacy-policy', function () {
    return view('privacy_policy');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index'); // when we login redirect to 'dashboard' page in view
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index'); // when we login redirect to 'dashboard' page in view
})->name('dashboard');


// Admin Logout

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// Admin Category

Route::get('/categories', [CategoryController::class, 'Index'])->name('categories');

Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');

Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');

Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');

Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

// Admin SubCategory

Route::get('/subcategories', [SubCategoryController::class, 'Index'])->name('subcategories');

Route::get('/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');

Route::post('/store/subcategory', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');

Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');

Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');

Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

// Admin District

Route::get('/district', [DistrictController::class, 'Index'])->name('district');

Route::get('/add/district', [DistrictController::class, 'AddDistrict'])->name('add.district');

Route::post('/store/district', [DistrictController::class, 'StoreDistrict'])->name('store.district');

Route::get('/edit/district/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');

Route::post('/update/district/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');

Route::get('/delete/district/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');

// Admin SubDistrict

Route::get('/subdistrict', [SubDistrictController::class, 'Index'])->name('subdistrict');

Route::get('/add/subdistrict', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');

Route::post('/store/subdistrict', [SubDistrictController::class, 'StoreSubDistrict'])->name('store.subdistrict');

Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');

Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');

Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');

// JSON Data for Category and District

Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);

Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);


// Admin Posts

Route::get('/add/post', [PostController::class, 'Create'])->name('add.post');

Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');

Route::get('/all/post', [PostController::class, 'AllPost'])->name('all.post');

Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');

Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');

Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');

// Social Settings

Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');

Route::post('update/social/setting/{id}', [SettingController::class, 'UpdateSocials'])->name('update.socials');

// Seo Settings

Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');

Route::post('update/seo/setting/{id}', [SettingController::class, 'UpdateSeos'])->name('update.seos');

// LiveTV Settings

Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');

Route::post('update/livetv/setting/{id}', [SettingController::class, 'UpdateLiveTv'])->name('update.livetv');

Route::get('livetv/active/{id}', [SettingController::class, 'ActiveLiveTv'])->name('livetv.active');

Route::get('livetv/deactive/{id}', [SettingController::class, 'DeactiveLiveTv'])->name('livetv.deactive');

// Notice Setting

Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');

Route::post('update/notice/{id}', [SettingController::class, 'UpdateNotice'])->name('update.notice');

Route::get('notice/active/{id}', [SettingController::class, 'ActiveNotice'])->name('notice.active');

Route::get('notice/deactive/{id}', [SettingController::class, 'DeactiveNotice'])->name('notice.deactive');

// Website Link 

Route::get('/website/setting', [SettingController::class, 'WebsiteSetting'])->name('all.website');

Route::get('/website/add', [SettingController::class, 'AddWebsite'])->name('add.website');

Route::post('/store/website', [SettingController::class, 'StoreWebsite'])->name('store.website');

Route::get('/edit/website/{id}', [SettingController::class, 'EditWebsite'])->name('edit.website');

Route::post('/update/website/{id}', [SettingController::class, 'UpdateWebsite'])->name('update.website');

Route::get('/delete/website/{id}', [SettingController::class, 'DeleteWebsite'])->name('delete.website');

// Photo Gallery 

Route::get('/photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');

Route::get('/gallery/add', [GalleryController::class, 'AddGallery'])->name('add.photo');

Route::post('/store/photo', [GalleryController::class, 'StorePhoto'])->name('store.photo');

Route::get('/edit/photo/{id}', [GalleryController::class, 'EditPhoto'])->name('edit.photo');

Route::post('/update/photo/{id}', [GalleryController::class, 'UpdatePhoto'])->name('update.photo');

Route::get('/delete/photo/{id}', [GalleryController::class, 'DeletePhoto'])->name('delete.photo');

// Video Gallery

Route::get('/video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');

Route::get('/video/add', [GalleryController::class, 'AddVideo'])->name('add.video');

Route::post('/store/video', [GalleryController::class, 'StoreVideo'])->name('store.video');

Route::get('/edit/video/{id}', [GalleryController::class, 'EditVideo'])->name('edit.video');

Route::post('/update/video/{id}', [GalleryController::class, 'UpdateVideo'])->name('update.video');

Route::get('/delete/video/{id}', [GalleryController::class, 'DeleteVideo'])->name('delete.video');

// Ads Section 

Route::get('/list/ads', [AdsController::class, 'ListAds'])->name('list.ad');

Route::get('/edit/ads/{id}', [AdsController::class, 'EditAds'])->name('edit.ads');

Route::post('/update/ads/{id}', [AdsController::class, 'UpdateAds'])->name('update.ads');

Route::get('/add/ads', [AdsController::class, 'AddAds'])->name('add.ads');

Route::post('/store/ads', [AdsController::class, 'StoreAd'])->name('store.ad');

Route::get('/delete/ads/{id}', [AdsController::class, 'DeleteAds'])->name('delete.ads');


							// Frontend

// Multi Language Routes

Route::get('/lang/hindi', [ExtraController::class, 'Hindi'])->name('lang.hindi');

Route::get('/lang/english', [ExtraController::class, 'English'])->name('lang.english');

// Single Post Page

Route::get('/view/post/{slug}', [ExtraController::class, 'SinglePost']); 

// Post Category and SubCategory

Route::get('/catpost/{id}/{category_en}', [ExtraController::class, 'CatPost']);

Route::get('/subcatpost/{id}/{subcategory_en}', [ExtraController::class, 'SubCatPost']);

// Search District In Home page

Route::get('/get/subdistrict/frontend/{district_id}', [ExtraController::class, 'GetSubDist']);

Route::get('/search/district', [ExtraController::class, 'SearchDistrict'])->name('searchby.districts');

// Writer Role

Route::get('/add/writer', [RoleController::class, 'InsertWriter'])->name('add.writer');

Route::post('/store/writer', [RoleController::class, 'StoreWriter'])->name('store.writer');

Route::get('/all/writer', [RoleController::class, 'AllWriter'])->name('all.writer');

Route::get('/edit/writer/{id}', [RoleController::class, 'EditWriter'])->name('edit.writer');

Route::post('/update/writer/{id}', [RoleController::class, 'UpdateWriter'])->name('update.writer');

Route::get('/delete/writer/{id}', [RoleController::class, 'DeleteWriter'])->name('delete.writer');

// Website Setting 

Route::get('/web/setting', [SettingController::class, 'MainWebSetting'])->name('web.setting');

Route::post('update/web/setting/{id}', [SettingController::class, 'UpdateWeb'])->name('update.web');

// Account Setting Route

Route::get('/account/setting', [AdminController::class, 'AccountSetting'])->name('account.setting');

Route::get('/profile/edit', [AdminController::class, 'ProfileEdit'])->name('profile.edit');

Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('store.profile');

// Change Password

Route::get('/show/password', [AdminController::class, 'ShowPassword'])->name('show.password');

Route::post('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');