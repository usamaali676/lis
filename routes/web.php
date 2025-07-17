<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessCategoriesController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\WebsiteBusinessController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\GoogleController;
use App\Models\BusinessCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\PermissionMiddleware;

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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "cache Clear";
});
Route::get('/runapi', [GoogleController::class,  'try'])->name('runapi');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function(){
//     return view('FrontEnd.index')->name('front');
// });
Route::get('/', [DashboardController::class,  'index'])->name('front');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/sendmail', [DashboardController::class, 'sendmail'])->name('sendmail');
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/blogs', [DashboardController::class, 'blog'])->name('blogs');
Route::get('/list-of-local-businesses-in-usa', [DashboardController::class, 'listing'])->name('listing');
Route::get('search', [DashboardController::class, 'search'])->name('search');
Route::get('category/{slug?}', [DashboardController::class, 'SingleCategory'])->name('singcat');
// Route::get('/show/{slug?}', [BusinessController::class, 'single'])->name('business.single');
Route::get('/single-state/{slug?}', [DashboardController::class, 'cities'])->name('cities');
Route::get('/test', [DashboardController::class, 'test'])->name('test');
Route::get('/filter', [DashboardController::class, 'filter'])->name('filter');
Route::get('/blogfilter', [DashboardController::class, 'blogfilter'])->name('blogfilter');
Route::get('/deletegallery', [BusinessController::class, 'deletegallery'])->name('deletegallery');
Route::get('/test', [SitemapController::class, 'test'])->name('testmap');
Route::get('/landingmap', [SitemapController::class, 'landpage'])->name('landpagemap');
Route::get('/blogmap', [SitemapController::class, 'blog'])->name('blogmap');
Route::get('/listingmap', [SitemapController::class, 'listing'])->name('listingmap');
Route::get('/categorymap', [SitemapController::class, 'category'])->name('categorymap');
Route::get('/videomap', [SitemapController::class, 'video'])->name('videomap');
Route::get('/imagesmap', [SitemapController::class, 'imagessitemap'])->name('imagesmap');
// Route::get('/alllist', [BusinessController::class, 'alllist'])->name('alllist');
Route::get('/alllp', [LandingPageController::class, 'getLandingPagesBySlugs'])->name('getLandingPagesBySlugs');

Auth::routes([
    'verify' => true,
]);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth','verified');

Route::controller(BusinessCategoriesController::class)->prefix('bcategory')->as('bc.')->middleware('auth','PermissionMiddleware', 'verified')->group(function(){
Route::get('/index',  'index')->name('index');
Route::get('/add', 'create')->name('add');
Route::post('/store', 'store')->name('store');
Route::get('/edit/{id?}',  'edit')->name('edit');
Route::post('/update',  'update')->name('update');
Route::get('/delete/{id?}',  'destroy')->name('delete');
});


Route::controller(BusinessController::class)->prefix('business')->as('business.')->middleware('auth','PermissionMiddleware', 'verified')->group(function(){
Route::get('/index', 'index')->name('index');
Route::get('/search', 'search')->name('search');
Route::get('/index/pending', 'index_pending')->name('index_pending');
Route::get('/add', 'create')->name('add');
Route::post('/store', 'store')->name('store');
Route::get('/show-LP/{id?}', 'show_lp')->name('show_lp');
Route::get('/edit/{id?}', 'edit')->name('edit');
Route::post('/update/{id?}', 'update')->name('update');
Route::get('/delete/{id?}', 'destroy')->name('delete');
});

Route::controller(UserController::class)->prefix('user')->as('user.')->middleware('auth','PermissionMiddleware', 'verified')->group(function(){
Route::get('index', 'index')->name('index');
Route::get('add', 'create')->name('add');
Route::post('store', 'store')->name('store');
Route::get('edit/{id?}', 'edit')->name('edit');
Route::post('updare', 'update')->name('update');
Route::get('delete/{id?}', 'destroy')->name('delete');
});


Route::controller(RoleController::class)->prefix('role')->as('role.')->middleware('auth','PermissionMiddleware', 'verified')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/add', 'create')->name('add');
    Route::post('/store', 'store')->name('store');
    Route::get('edit/{id?}',  'edit')->name('edit');
    Route::post('update',  'update')->name('update');
    Route::get('delete/{id?}',  'destroy')->name('delete');
    });

    Route::get('/deletearea/{id?}', [BusinessController::class, 'destroyarea'])->name('area.destroy');;

    Route::controller(StateController::class)->prefix('state')->as('state.')->middleware('auth','PermissionMiddleware', 'verified')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete/{id?}', 'destroy')->name('delete');
    });
    Route::controller(BlogController::class)->prefix('blog')->as('blog.')->middleware('auth','PermissionMiddleware', 'verified')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete/{id?}', 'destroy')->name('delete');
        Route::post('/ckeditor/upload', 'upload')->name('ckeditor');
    });

    Route::controller(LandingPageController::class)->prefix('landingpage')->as('landingpage.')->middleware('auth',  'verified')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
        Route::get('/create', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/update/{id?}', 'update')->name('update');
        Route::get('/delete/{id?}', 'destroy')->name('delete');
        Route::get('/logo-del',  'logo_del')->name('logo-del');
        Route::get('/deletebanner',  'deletebanner')->name('deletebanner');
        Route::get('/bannermob',  'bannermob')->name('bannermob');
        Route::get('/galleryrem',  'galleryrem')->name('galleryrem');
        Route::post('/submit', 'form')->name('form_submit');
        Route::get('/getData', 'getData')->name('getData');

    });

Route::get('/deletetag/{id?}',[BusinessController::class, 'destroytag'])->name('tag.delete');
Route::get('/{slug?}', [WebsiteBusinessController::class, 'index'])->name('business.single');
Route::post('/reviewpost', [ReviewsController::class, 'store'])->name('store.review');
Route::get('/businesses/{business}/reviews', [ReviewsController::class, 'fetchReviews'])->name('reviews.fetch');

// Landinpage Image Delte

// Route::get('email/verify/{email}/{token}', 'Auth\RegisterController@verifyemail')->name('verify');
// Route::get('/{slug?}', [WebsiteBusinessController::class, 'index'])->name('blog.single');

