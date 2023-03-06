<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\Admin\NewController as AdminNewController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SlideController as AdminSlideController;
use App\Http\Controllers\Admin\ElectroplatingController as AdminElectroplatingController;
use App\Http\Controllers\Admin\СeramicController as AdminCeramicsController;
use App\Http\Controllers\СategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegistretionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EddNewsController;
use App\Http\Controllers\СeramicController;
use App\Http\Controllers\Admin\IndexController as AdminController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['prefix' => 'admin456123', 'as' => 'admin.'], function(){
    Route::get('/', AdminController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news',AdminNewController::class );
    Route::resource('/slides',AdminSlideController::class );
    Route::resource('/electroplatings',AdminElectroplatingController::class );
    Route::resource('/ceramics',AdminCeramicsController::class );
});
// Route::resource('/news444444',AdminNewController::class );
// //?categoryId={categoryId}
// Route::get('/news', [ NewController::class, 'index'])
//     ->name('news.index');

    
// Route::get('/news/{id}', [ NewController::class, 'show'])
//     ->where( 'id', '\d+')
//     ->name('news.show');

// Route::get('/category', [ СategoryController::class, 'index'])
//     ->name('category.index');

Route::get('/', [ MainController::class, 'index'])
    ->name('main');
Route::get('/ceramics', [ СeramicController::class, 'index'])
    ->name('ceramics');

// Route::resource('/feedback',  FeedbackController::class);

// Route::resource('/data',  DataController::class);
   
// Route::get('/registretion', [ RegistretionController::class, 'index'])
//     ->name('main');

// Route::get('/eddNews', [ EddNewsController::class, 'index'])
//     ->name('main');

// Route::get('collection', function () {
//     $arr = ['Sergey', 'Andrey', 'gggg', 'hdjfhgdkgdk'];
//     $collection = collect($arr);
//     // dd($collection->count() );

// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
