<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Api\CategoryController as Category;
use App\Http\Controllers\Api\ItemsController as Items;
use App\Http\Controllers\Api\WarehouseController as Warehouse;
use App\Http\Controllers\Api\UsersController as AddUser;
use App\Http\Controllers\Api\PermissionController as Permission;
use App\Http\Controllers\Api\ElementsControllers as Elements;
use App\Http\Controllers\Api\OrdersControllers as Orders;
use App\Http\Controllers\Api\productController as product;
use App\Http\Controllers\Api\CompanyController as Company;
use App\Http\Controllers\Api\VendorsControllers as Vendors;

use App\Http\Controllers\Api\ServiceController as Service;
use App\Http\Controllers\Api\AuthController as Auth;
use App\Http\Controllers\Api\UserController as User;
use App\Http\Controllers\Api\PetDetailsController as Petdetails;
use App\Http\Controllers\Api\LocationController as Location;
use App\Http\Controllers\Api\BreedController as BreedDetails;
use App\Http\Controllers\Api\AddressController as AddressDetails;
use App\Http\Controllers\Api\TimerangeController as Timerange;
use App\Http\Controllers\Api\PetageController as Petage;
use App\Http\Controllers\Api\TermsController as Terms;
use App\Http\Controllers\Api\ServiceBookingController as Servicebooking;
use App\Http\Controllers\Api\WalletController as WalletDetails;
use App\Http\Controllers\Api\CardController as CardDetails;
use App\Http\Controllers\Api\BankdetailsController as Bankdetails;
use App\Http\Controllers\Api\PayoutfrequencyController as Payout;
use App\Http\Controllers\Api\PromoCodeController as PromoCode;
use App\Http\Controllers\Api\BreakingEventController as BreakingEvent;
use App\Http\Controllers\Api\AdminRevenueController as AdminRevenue;
use App\Http\Controllers\Api\CancellationReasonController as CancellationReason;
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
Route::get('category', function () {
    return view('category');
});
Route::get('items', function () {
    return view('items');
});
Route::get('warehouse', function () {
    return view('warehouse');
});
Route::get('permission',    [Permission::class, 'menulist']);
Route::get('permission1', function () {
   // return view('permission');
   
});
Route::get('users', function () {
    return view('users');
});
Route::get('elements', function () {
    return view('elements');
});
Route::get('addvalue', function () {
    return view('addvalue');
})->name('addvalue');
Route::get('adduser', function () {
    return view('adduser');
})->name('adduser');
Route::get('orders', function () {
    return view('orders');
});
Route::get('company', function () {
    return view('company');
});
Route::get('vendors', function () {
    return view('vendors');
});
Route::get('product', function () {
    return view('product');
});


Route::get('breed', function () {
    return view('breed');
});
Route::get('address', function () {
    return view('address');
});
Route::get('petowneruser', function () {
    return view('petowneruser');
});
Route::get('petcaregiver', function () {
    return view('petcaregiver');
});
Route::get('petdetails', function () {
    return view('petdetails');
});
Route::get('timerange', function () {
    return view('timerange');
})->name('timerange');
Route::get('petage', function () {
    return view('petage');
});
Route::get('terms', function () {
    return view('terms');
});
Route::get('privacy', function () {
    return view('privacy');
});
Route::get('about', function () {
    return view('about');
});
Route::get('help', function () {
    return view('help');
});
Route::get('servicebooking', function () {
    return view('servicebooking');
});
Route::get('viewCalendar', function () {
    return view('viewCalendar');
});
Route::get('/dashboard', [User::class, 'dashboard']);
Route::get('ratingandreviews/{id}', function () {
    return view('ratingandreviews');
});
Route::get('wallet', function () {
    return view('wallet');
});
Route::get('card', function () {
    return view('card');
});
Route::get('calendar', function () {
    return view('calendar');
});
Route::get('bankdetails', function () {
    return view('bankdetails');
});
Route::get('promocode', function () {
    return view('promocode');
});
Route::get('breakingevent', function () {  
    return view('breakingevent');
});
Route::get('adminrevenue', function () {
    return view('adminrevenue');
});
Route::get('settings', function () {
    return view('settings');
});
Route::get('cancellationreason', function () {
    return view('cancellationreason');
});
Route::get('category', function () {
    return view('category');
});



Route::get('notificationlist',[Servicebooking::class, 'adminnotificationlist']);
Route::get('notificationlistall',[Servicebooking::class, 'adminnotificationlistAll']);

Route::get('addpetdetails', function () {
    return view('addpetdetails');
});
Route::get('location', function () {
    return view('location');
});
Route::get('demo', function () {
    return view('demo');
});
Route::get('adduser/{id}', function () {
    return view('adduser');
})->name('adduser');
Route::get('viewbookingservice/{id}', function () {
    return view('viewbookingservice');
})->name('viewbookingservice'); 
});


Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('signup', function () {
    return view('signup');
});
Route::get('register', function () {
    return view('register');
});


Route::get('logout', function () {
    return view('login');
})->name('login'); 
 Route::get('dashboard', function () {
     return view('dashboard');
 });
 //Route::get('dashboard', function () {
     //return view('dashboard');
 //});
Route::post('/adminlogin',[Admin::class, 'adminLogin']);
Route::post('/signin',[Admin::class, 'signinVerify']);


Route::post('/addcategory', [Category::class, 'addcategory']);
Route::get('/getcategoryList', [Category::class, 'getcategoryList']);
Route::post('/editcategoryList', [Category::class, 'editcategoryList']);
Route::post('/updatecategoryList', [Category::class, 'updatecategoryList']);
Route::post('/deletecategory', [Category::class, 'deletecategory']);
Route::post('/categoriestatus', [Category::class, 'categoriestatus']);

Route::get('/getitemsList', [Items::class, 'getitemsList']);
Route::post('/additems', [Items::class, 'additems']);
Route::post('/edititemsList', [Items::class, 'edititemsList']);
Route::post('/updateitemsList', [Items::class, 'updateitemsList']);
Route::post('/deleteitems', [Items::class, 'deleteitems']);
Route::post('/itemsStatus', [Items::class, 'itemsStatus']);
Route::post('/itemsStatus', [Items::class, 'itemsStatus']);


Route::get('/getproductList', [product::class, 'getproductList']);
Route::get('/getcategories', [product::class, 'getcategories']);
Route::get('/getitems', [product::class, 'getitems']);
Route::get('/getwarehouse', [product::class, 'getwarehouse']);
Route::post('/addproduct', [product::class, 'addproduct']);
Route::post('/updateproductList', [product::class, 'updateproductList']);
Route::post('/editproductList', [product::class, 'editproductList']);
Route::post('/deleteproduct', [product::class, 'deleteproduct']);
Route::get('/getcolorList', [product::class, 'getcolorList']);
Route::get('/getsizeList', [product::class, 'getsizeList']);
Route::post('/importproduct', [product::class, 'importproduct']);
Route::post('/productstatus', [product::class, 'productstatus']);
Route::get('/getcountProduct', [product::class, 'getcountProduct']);
/*------ new Warehouse-----*/
Route::get('/getwarehouseList', [Warehouse::class, 'getwarehouseList']);
Route::post('/addwarehouse', [Warehouse::class, 'addwarehouse']);
Route::post('/editwarehouseList', [Warehouse::class, 'editwarehouseList']);
Route::post('/updatewarehouseList', [Warehouse::class, 'updatewarehouseList']);
Route::post('/deletewarehouse', [Warehouse::class, 'deletewarehouse']);
Route::post('/warehousestatus', [Warehouse::class, 'warehousestatus']);

/*-------Users------------*/
Route::post('/addusers',    [AddUser::class, 'addusers']);
Route::get('/getusersList',    [AddUser::class, 'getusersList']);
Route::post('/editusersList',    [AddUser::class, 'editusersList']);
Route::post('/updateusers',    [AddUser::class, 'updateusers']);
Route::post('/deleteusers',    [AddUser::class, 'deleteusers']);
Route::get('/getroleslist',    [AddUser::class, 'getroleslist']);
Route::get('/getcountUsers',    [AddUser::class, 'getcountUsers']);
/*-------Users------------*/
Route::post('/addpermission',    [Permission::class, 'addpermission']);
Route::get('/getpermissionList',    [Permission::class, 'getpermissionList']);
Route::post('/editpermissionList',    [Permission::class, 'editpermissionList']);
Route::post('/updatepermissionList',    [Permission::class, 'updatepermissionList']);
Route::post('/deletepermission',    [Permission::class, 'deletepermission']);
Route::post('/permission',    [Permission::class, 'permission']);
Route::post('/submitpermissionList',    [Permission::class, 'submitpermissionList']);

Route::post('/addelements',    [Elements::class, 'addelements']);
Route::get('/getelementsList',    [Elements::class, 'getelementsList']);
Route::post('/editelementsList',    [Elements::class, 'editelementsList']);
Route::post('/updatelementsList',    [Elements::class, 'updatelementsList']);
Route::post('/deleteelements',    [Elements::class, 'deleteelements']);
Route::post('/elementsstatus',    [Elements::class, 'elementsstatus']);

Route::get('/getvendorsList',    [Vendors::class, 'getvendorsList']);
Route::post('/addvendors',    [Vendors::class, 'addvendors']);
Route::post('/editvendorsList',    [Vendors::class, 'editvendorsList']);
Route::post('/updatevendors',    [Vendors::class, 'updatevendors']);
Route::post('/deletevendors',    [Vendors::class, 'deletevendors']);

Route::post('/getProductValueById',    [Orders::class, 'getProductValueById']);
Route::get('/getordersList',    [Orders::class, 'getordersList']);
Route::get('/getproductname',    [Orders::class, 'getproductname']);
Route::get('/defaulproductlist',    [Orders::class, 'defaulproductlist']);
Route::post('/addOrdersItems',    [Orders::class, 'addOrdersItems']);
Route::post('/editordersList',    [Orders::class, 'editordersList']);
Route::post('/getitemsdetails',    [Orders::class, 'getitemsdetails']);
Route::post('/updateOrdersList',    [Orders::class, 'updateOrdersList']);
Route::post('/getProductPrice',    [Orders::class, 'getProductPrice']);
Route::get('/getratevalue',    [Orders::class, 'getratevalue']);
Route::post('/deleteOrders',    [Orders::class, 'deleteOrders']);
Route::post('/deleteproductlist',    [Orders::class, 'deleteproductlist']);
Route::get('/getcountOrders',    [Orders::class, 'getcountOrders']);

Route::get('/getcompanylist',    [Company::class, 'getcompanylist']);
Route::post('/updateCompanyList',    [Company::class, 'updateCompanyList']);
Route::get('/getCurrency',    [Company::class, 'getCurrency']);

Route::post('/addelementsvalue',    [Elements::class, 'addelementsvalue']);
Route::get('/getelementsvalueList',    [Elements::class, 'getelementsvalueList']);
Route::post('/editaddvalueList',    [Elements::class, 'editaddvalueList']);
Route::post('/updatelementsvalue',    [Elements::class, 'updatelementsvalue']);
Route::post('/deleteelementsvalueList',    [Elements::class, 'deleteelementsvalueList']);
Route::get('/getelementsnamelist',    [Elements::class, 'getelementsnamelist']);

Route::get('/getuserList',    [User::class, 'getuserList']);
Route::get('/getuserType',    [User::class, 'getuserType']);
Route::post('/getusersDetails',[User::class, 'getusersDetails']);
Route::post('/updateUser', [User::class, 'updateUser']);//deleteGallery
Route::post('/deleteGallery', [User::class, 'deleteGallery']);
Route::post('/deleteUser', [User::class, 'deleteuserList']);
Route::post('/adminlogin',[Admin::class, 'adminLogin']);
Route::post('/changeStatus',[User::class, 'changeuserStatus']);
Route::get('/getdocumentlist',    [User::class, 'getdocumentlist']);
Route::post('/documentupload',    [User::class, 'documentupload']);
Route::post('/petcaregiverStatus',[User::class, 'petcaregiverStatus']);
Route::post('/deletepettypeGallery', [User::class, 'deletepettypeGallery']);
Route::post('/userStatus',[User::class, 'userStatus']);
/* pet owner userlist */
Route::get('/getowneruserlist',    [User::class, 'getowneruserlist']);

/* pet care giver userlist */

Route::get('/getpetcaregiverlist',    [User::class, 'getpetcaregiverlist']);

/*------ Breed-----*/
Route::get('/getbreedDetails', [BreedDetails::class, 'getbreedDetails']);
Route::post('/addBreed', [BreedDetails::class, 'addBreed']);
Route::post('/editBreed', [BreedDetails::class, 'editBreed']);
Route::post('/updateBreedDetails', [BreedDetails::class, 'updateBreedDetails']);
Route::post('/deleteBreed', [BreedDetails::class, 'deleteBreed']);
Route::get('/getpetType', [BreedDetails::class, 'getpetType']);

/*------Address-----*/
Route::get('/getaddressDetails', [AddressDetails::class, 'getaddressDetails']);
Route::post('/addAddress', [AddressDetails::class, 'addAddress']);
Route::post('/editAddress', [AddressDetails::class, 'editAddress']);
Route::post('/updateAddressDetails', [AddressDetails::class, 'updateAddressDetails']);
Route::post('/deleteAddress', [AddressDetails::class, 'deleteAddress']);
Route::get('/getusers', [AddressDetails::class, 'getusers']);
Route::post('addressstatus',[AddressDetails::class, 'addressstatus']);


/*---- time range-----*/ 
Route::get('/gettimerangelist', [Timerange::class, 'gettimerangeList']);
Route::get('/gettimerangelistApi', [Timerange::class, 'gettimerangelistApi']);
Route::post('/getinsert', [Timerange::class, 'getinsert']);
Route::post('/edittimerange', [Timerange::class, 'edittimerange']);
Route::post('/updatetimerange', [Timerange::class, 'updatetimerange']);
Route::post('/deletetimerange', [Timerange::class, 'deletetimerange']);

/*-----pet age---*/
Route::get('/getageList', [Petage::class, 'getageListweb']);
Route::post('/addpetage', [Petage::class, 'addpetage']);
Route::post('/editageList', [Petage::class, 'editageList']);
Route::post('/updateageList', [Petage::class, 'updateageList']);
Route::post('/deletepetageList', [Petage::class, 'deletepetageList']);
Route::post('/getpetage', [Petage::class, 'getpetage']);
Route::get('adminlogout',[Admin::class, 'logout']);

/*-----Tiny MCE Editor---*/
Route::post('/addTermsandConditions', [Terms::class, 'addTermsandConditions']);
Route::post('/getTerms', [Terms::class, 'getTerms']);
Route::post('/addPrivacyPolicy', [Terms::class, 'addPrivacyPolicy']);
Route::post('/getPrivacy', [Terms::class, 'getPrivacy']);
Route::post('/addAboutYou', [Terms::class, 'addAboutYou']);
Route::post('/getAbout', [Terms::class, 'getAbout']);
Route::post('/addHelp', [Terms::class, 'addHelp']);
Route::post('/getHelp', [Terms::class, 'getHelp']);

Route::get('servicebookinglist',[Servicebooking::class, 'servicebookinglist']);
Route::get('servicebookinglist/{status}',[Servicebooking::class, 'servicebookinglist']);
Route::get('pendinglist',[Servicebooking::class, 'pendinglist']);
Route::get('pendinglist/{status}',[Servicebooking::class, 'pendinglist']);
Route::get('completelist',[Servicebooking::class, 'completelist']);
Route::get('completelist/{status}',[Servicebooking::class, 'completelist']);
Route::get('cancellist',[Servicebooking::class, 'cancellist']);
Route::get('cancellist/{status}',[Servicebooking::class, 'cancellist']);
Route::get('upcominglist',[Servicebooking::class, 'upcoming']);
Route::get('upcominglist/{status}',[Servicebooking::class, 'upcoming']);
Route::post('getbookingdetails',[Servicebooking::class, 'getbookingdetails']);
Route::post('updateBookingStatus',[Servicebooking::class, 'updateBookingStatus']);
Route::post('updateserviceDetails',[Servicebooking::class, 'updateserviceDetails']);
Route::post('getPetOwnerAddress',[Servicebooking::class, 'getaddressdetails']);
Route::post('getwalkingdetails',[Servicebooking::class, 'getwalkingminutes']);
Route::post('getbreed',[Servicebooking::class, 'getbreed']);
Route::post('getfrequencydetails',[Servicebooking::class, 'getfrequencydetails']);
Route::post('changepetdetails',[Servicebooking::class, 'changepetdetails']);
Route::post('changecaregiverdetails',[Servicebooking::class, 'changecaregiverdetails']);
Route::post('getratingreviews',[Servicebooking::class, 'getratingreviews']);
Route::post('updateratingreviews',[Servicebooking::class, 'updateratingreviews']);
Route::post('deleteratings',[Servicebooking::class, 'deleteratings']);
Route::get('revenueCOunt',[Servicebooking::class, 'revenueCOunt']);
/*-------Wallet------------*/
Route::get('getwalletDetails',[WalletDetails::class, 'getwalletDetails']);
Route::get('getusernamewallet',[WalletDetails::class, 'getusernamewallet']);
Route::post('/addPayment', [WalletDetails::class, 'addPayment']);
Route::post('/editWallet', [WalletDetails::class, 'editWallet']);
Route::post('/updateWalletDetails', [WalletDetails::class, 'updateWalletDetails']);
Route::post('/deleteWallet', [WalletDetails::class, 'deleteWallet']);

/*-------Card------------*/
Route::get('getCardDetails',[CardDetails::class, 'getCardDetails']);
Route::get('getusername',[CardDetails::class, 'getusername']);
Route::post('/addCardDetails', [CardDetails::class, 'addCardDetails']);
Route::post('/editCardDetails', [CardDetails::class, 'editCardDetails']);
Route::post('/updateCardDetails', [CardDetails::class, 'updateCardDetails']);
Route::post('/deleteCard', [CardDetails::class, 'deleteCard']);
Route::post('cardDetailsStatus',[CardDetails::class, 'cardDetailsStatus']);


/*-----Bank Details----*/
Route::get('getbankdetails',[Bankdetails::class, 'getbankdetails']);
Route::post('addbankdetails',[Bankdetails::class, 'addbankdetails']);
Route::get('getuserdetails',[Bankdetails::class, 'getuserdetails']);
Route::post('editbankdetails',[Bankdetails::class, 'editbankdetails']);
Route::post('updatebankDetails',[Bankdetails::class, 'updatebankDetails']);
Route::post('deletebanklist',[Bankdetails::class, 'deletebanklist']);
Route::post('bankdetailsstatus',[Bankdetails::class, 'bankdetailsstatus']);

Route::get('getcurmonservicedetails',[Servicebooking::class, 'getcurmonservicedetails']);

/*-----promo code details----*/
Route::get('getpromocodelist',[PromoCode::class, 'getpromocodelist']);
Route::post('addpromocode',[PromoCode::class, 'addpromocode']);
Route::post('editpromocode',[PromoCode::class, 'editpromocode']);
Route::post('updatepromocode',[PromoCode::class, 'updatepromocode']);
Route::post('deletpromocodelist',[PromoCode::class, 'deletpromocodelist']);
Route::get('getpromocodeusers',[PromoCode::class, 'getpromocodeusers']);
Route::post('addpromocodeusers',[PromoCode::class, 'addpromocodeusers']);
Route::post('getpromocodeuserslist',[PromoCode::class, 'getpromocodeuserslist']);
Route::post('promoCodeStatus',[PromoCode::class, 'promoCodeStatus']);
Route::post('deleteUserspromo',[PromoCode::class, 'deleteUserspromo']);

/*-----Breaking Events details----*/
Route::get('breakingeventlist',[BreakingEvent::class, 'breakingeventlist']);
Route::post(' addbreakingevents',[BreakingEvent::class, 'addbreakingevents']);
Route::post('/editBreakingevent', [BreakingEvent::class, 'editBreakingevent']);
Route::post('/updateBreakingDetails', [BreakingEvent::class, 'updateBreakingDetails']);
Route::post('deleteBreakingtypelist',[BreakingEvent::class, 'deleteBreakingtypelist']);
Route::post('BreakingEventsStatus',[BreakingEvent::class, 'BreakingEventsStatus']);

/*-----Cancellation Reason details----*/
Route::get('/getCancellationReason', [CancellationReason::class, 'getCancellationReason']);
Route::post('/addCancellationReason', [CancellationReason::class, 'addCancellationReason']);
Route::post('/editCancellationReason', [CancellationReason::class, 'editCancellationReason']);
Route::post('/updateCancellationReason', [CancellationReason::class, 'updateCancellationReason']);
Route::post('/deleteReason', [CancellationReason::class, 'deleteReason']);
Route::post('cancellationReasonStatus',[CancellationReason::class, 'cancellationReasonStatus']);

Route::post('saveoption',[Settings::class, 'saveoption']);
Route::get('bankcardoption',[Settings::class, 'bankcardoption']);





