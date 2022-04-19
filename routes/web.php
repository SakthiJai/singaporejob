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
use App\Http\Controllers\Api\JobapplicationController as Jobapplication;


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
Route::get('jobapplication', function () {
    return view('jobapplication');
});
Route::get('viewjobapplication/{id}', function () {
    return view('viewjobapplication');
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
Route::get('/getsubcategory', [Jobtype::class, 'getsubcategory']);
Route::get('/getexperience', [Jobtype::class, 'getexperience']);
Route::post('/jobtypeStatus', [Jobtype::class, 'jobtypeStatus']);
Route::post('/deletecatgeroy', [Jobtype::class, 'deletecatgeroy']);
Route::post('/deletejobtype', [Jobtype::class, 'deletejobtype']);

Route::post('/categoryStatus', [Category::class, 'categoryStatus']);
Route::post('/deletecatgeroy', [Category::class, 'deletecatgeroy']);

Route::post('/addsectors', [Sectors::class, 'addsectors']);
Route::get('/getsectorslist', [Sectors::class, 'getsectorslist']);
Route::post('/sectorsStatus', [Sectors::class, 'sectorsStatus']);
Route::post('/deletesectors', [Sectors::class, 'deletesectors']);

Route::post('/addSubcategory', [Subcategory::class, 'addSubcategory']);
Route::post('/subcategoryStatus', [Subcategory::class, 'subcategoryStatus']);
Route::get('/getcategoryname', [Subcategory::class, 'getcategoryname']);
Route::get('/getsubcategorylist', [Subcategory::class, 'getsubcategorylist']);
Route::get('/geteducationList', [Subcategory::class, 'geteducationList']);
Route::post('/deletesubcategory', [Subcategory::class, 'deletesubcategory']);


Route::post('/addexperience', [Experience::class, 'addexperience']);
Route::get('/getexperiencelist', [Experience::class, 'getexperiencelist']);
Route::post('/experienceStatus', [Experience::class, 'experienceStatus']);
Route::post('/deleteexperience', [Experience::class, 'deleteexperience']);

Route::get('/getjobapplicationlist', [Jobapplication::class, 'getjobapplicationlist']);
Route::get('getviewJobList', [Jobapplication::class, 'getviewJobList']);

Route::get('adminlogout',[Admin::class, 'logout']);






