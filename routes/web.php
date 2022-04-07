<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Api\JobtypeController as Jobtype;
use App\Http\Controllers\Api\CategoryController as Category;
use App\Http\Controllers\Api\SectorsController as Sectors;
use App\Http\Controllers\Api\SubcategoryController as Subcategory;
use App\Http\Controllers\Api\ExperienceController as Experience;
use App\Http\Controllers\Api\AuthController as Auth;
use App\Http\Controllers\Api\UserController as User;
use App\Http\Controllers\Api\SettingsController as Settings;


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
Route::group(['middleware' => 'auth'], function(){
Route::get('jobtype', function () {
    return view('jobtype');
});
Route::get('category', function () {
    return view('category');
});
Route::get('subcategory', function () {
    return view('subcategory');
});
Route::get('experiencerange', function () {
    return view('experiencerange');
});
Route::get('sectors', function () {
    return view('sectors');
});
});


Route::get('login', function () {
    return view('login');
})->name('login');



Route::get('logout', function () {
    return view('login');
})->name('login'); 
 Route::get('dashboard', function () {
     return view('dashboard');
 });
 //Route::get('dashboard', function () {
     //return view('dashboard');
 //});

Route::post('/addJobtype', [Jobtype::class, 'addJobtype']);
Route::get('/getjoblist', [Jobtype::class, 'getjoblist']);
Route::get('/getcategorylist', [Jobtype::class, 'getcategorylist']);
Route::get('/getsectors', [Jobtype::class, 'getsectors']);

Route::post('/addcategory', [Category::class, 'addcategory']);

Route::post('/addsectors', [Sectors::class, 'addsectors']);
Route::get('/getsectorslist', [Sectors::class, 'getsectorslist']);

Route::post('/addSubcategory', [Subcategory::class, 'addSubcategory']);
Route::get('/getcategoryname', [Subcategory::class, 'getcategoryname']);
Route::get('/getsubcategorylist', [Subcategory::class, 'getsubcategorylist']);

Route::post('/addexperience', [Experience::class, 'addexperience']);
Route::get('/getexperiencelist', [Experience::class, 'getexperiencelist']);
Route::post('/experienceStatus', [Experience::class, 'experienceStatus']);

Route::get('adminlogout',[Admin::class, 'logout']);






