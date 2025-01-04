<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\Admin\NewController as AdminNewController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SlideController as AdminSlideController;
use App\Http\Controllers\Admin\SlideMobilController as AdminSlideMobilController;
use App\Http\Controllers\Admin\ElectroplatingController as AdminElectroplatingController;
use App\Http\Controllers\Admin\CeramicController as AdminCeramicController;
use App\Http\Controllers\Admin\AmuletController as AdminAmuletControllerController;
use App\Http\Controllers\Admin\CozyDecorController as AdminCozyDecorController;
use App\Http\Controllers\Admin\MagicOfPolymerController as AdminMagicOfPolymerController;
use App\Http\Controllers\Admin\MagicOfStonesAndBeadController as AdminMagicOfStonesAndBeadController;
use App\Http\Controllers\Admin\InformationController as AdminInformationController;
use App\Http\Controllers\СategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegistretionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EddNewsController;
use App\Http\Controllers\CeramicController;
use App\Http\Controllers\AmuletController;
use App\Http\Controllers\CozyDecorController;
use App\Http\Controllers\MagicOfPolymerController;
use App\Http\Controllers\MagicOfStonesAndBeadController;
use App\Http\Controllers\ElectroplatingController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Account\IndexController as AccountController;
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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)->name('account');

    Route::group(['prefix' => 'admin456123', 'as' => 'admin.'], function(){
        Route::get('/', AdminController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news',AdminNewController::class );
        Route::resource('/slides',AdminSlideController::class );
        Route::resource('/slideMobils',AdminSlideMobilController::class );
        Route::resource('/electroplatings',AdminElectroplatingController::class );
        Route::resource('/ceramics',AdminCeramicController::class );
        Route::resource('/amulets',AdminAmuletControllerController::class );
        Route::resource('/cozyDecors',AdminCozyDecorController::class );
        Route::resource('/magicOfPolymers',AdminMagicOfPolymerController::class );
        Route::resource('/magicOfStonesAndBeads',AdminMagicOfStonesAndBeadController::class );
        Route::resource('/informations', AdminInformationController::class );
    });
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
Route::get('/ceramics', [ CeramicController::class, 'index'])
    ->name('ceramics');
Route::get('/amulet', [ AmuletController::class, 'index'])
    ->name('amulet');
Route::get('/cozyDecor', [ CozyDecorController::class, 'index'])
    ->name('cozyDecor');
Route::get('/magicOfPolymer', [ MagicOfPolymerController::class, 'index'])
    ->name('magicOfPolymer');
Route::get('/magicOfStonesAndBead', [ MagicOfStonesAndBeadController::class, 'index'])
    ->name('magicOfStonesAndBead');
Route::get('/electroplatings', [ ElectroplatingController::class, 'index'])
    ->name('electroplatings');
    Route::get('/informations', [ InformationController::class, 'index'])
    ->name('informations');

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
Route::get('session', function () {
    
    // if(session()->has('sumesession')) {
    //     dd(1);
    //     dd(session()->get('sumesession'));
    // }
    // session()->put('sumesession', 'some test');
    if(session()->has('sumesession')) {
        dd(session()->get('sumesession')); 
    }
    session()->put('sumesession', 'some test');
    dd(session()->all());

});