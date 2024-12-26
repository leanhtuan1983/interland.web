<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\FeIndexController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'posts' => PostController::class,
    'categories' => CategoryController::class,
    'pages'=> PageController::class,
    'banners'=> BannerController::class,
    'partners' => PartnerController::class
]);

Route::get('/',[FeIndexController::class,'index'])->name('home');
Route::get('/gioi-thieu',[FeIndexController::class,'introduce'])->name('introduce');
Route::get('/settings',[SettingController::class,'index'])->name('settings');
Route::get('/linh-vuc-hoat-dong',[FeIndexController::class,'showAllField'])->name('all-fields');
Route::get('/du-an',[FeIndexController::class,'showAllProject'])->name('all-projects');
Route::get('/{post}',[FeIndexController::class,'viewFieldItemPost'])->name('viewFieldItemPost');
Route::get('/khach-hang',[FeIndexController::class,'costumer'])->name('costumer');
