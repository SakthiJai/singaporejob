<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController as Auth;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Api\UserController as User;
use App\Http\Controllers\Api\ServiceController as Service;
use App\Http\Controllers\Api\CreditReportController as CreditReport;
use App\Http\Controllers\Api\ServiceBookingController as ServiceBooking;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\Api\PetDetailsController as Petdetails;
use App\Http\Controllers\Api\PetcaredetailsController as Petcare;
use App\Http\Controllers\Api\AddressController as AddressDetails;
use App\Http\Controllers\Api\BreedController as Breed;
use App\Http\Controllers\Api\Documentcontroller as Document;
use App\Http\Controllers\Api\PetageController as Petage;
use App\Http\Controllers\Api\Petcaregiverlist as petcaregiver;
use App\Http\Controllers\Api\TermsController as Terms;
use App\Http\Controllers\Api\WalletController as WalletDetails;
use App\Http\Controllers\Api\CardController as CardDetails;
use App\Http\Controllers\Api\PayoutfrequencyController as Payout;
use App\Http\Controllers\Api\BankdetailsController as Bankdetails;
use App\Http\Controllers\Api\SetavailableController as Setavailable;
use App\Http\Controllers\Api\PromoCodeController as Promocode;
use App\Http\Controllers\Api\BreakingEventController as BreakingEvent;
use App\Http\Controllers\Api\PetcareImageController as Petcareimage;
use App\Http\Controllers\Api\CancellationReasonController as CancellationReason;

 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('/getPetType', [Service::class, 'getPetType'])->name('api.getPetType');
Route::post('/fileUpload', [Admin::class, 'fileUpload'])->name('api.fileUpload');
Route::post('/ratingdetails', [Service::class, 'ratingdetails']);
Route::get('/getratingdetails', [Service::class, 'getratingdetails']);
Route::post('/updateratingdetails', [Service::class, 'updateratingdetails']);

//https://pet.elegantsoftwares.in/stage/api/fileUpload
});
Route::post('/findCaregiver', [ServiceBooking::class, 'findservice']);
Route::post('/bookservice', [ServiceBooking::class, 'bookservice']);
Route::get('/requirement_list', [Auth::class, 'get_requirements'])->name('api.requirement');
Route::get('/service_pages', [Auth::class, 'get_service_pages'])->name('api.service_pages');
Route::get('/getdocumentList', [Document::class, 'getdocumentList']);
Route::get('/getageList', [Petage::class, 'getageList']);
Route::get('/frequency', [ServiceBooking::class, 'frequency']);

/* Authentication Api */
Route::post('/mobilenoverify', [User::class, 'mobilenumber_verify'])->name('api.mobilenoverify');
Route::post('/otp_verify', [User::class, 'otp_verify'])->name('api.otp_verify');
Route::post('/basicInformation', [User::class, 'basicInformation'])->name('api.basicInformation');
Route::post('/petOwner', [User::class, 'petOwner'])->name('api.petOwner');
Route::get('/getUserDetailsByToken', [User::class, 'getUserDetailsByToken']);

Route::get('/getServices', [Service::class, 'getServices'])->name('api.getServices');
Route::get('/getPetRange', [Service::class, 'getPetRange'])->name('api.petrange');

Route::post('/addpetdetails', [Petdetails::class, 'petdetails'])->name('api.petdetails');;
Route::post('/getpetDetails', [Petdetails::class, 'getpetDetails']);
Route::post('/deletepetDetails', [Petdetails::class, 'deletepetDetails'])->name('api.deletepetDetails');
Route::post('/apigetpetDetails', [Petdetails::class, 'apigetpetDetails']);
Route::post('/updatepetdetails', [Petdetails::class, 'petdetails']);
Route::post('/getbreedname', [Petdetails::class, 'getbreedname'])->name('api.getbreedname');

Route::post('/addpetcareDetails', [Petcare::class, 'petcareDetails']);
Route::get('/getpetwalkingTime', [Petcare::class, 'getpetwalkingTime']);

Route::post('/apigetaddressDetails', [AddressDetails::class, 'apigetaddressDetails']);
Route::post('/addAddress', [AddressDetails::class, 'addAddress']);
Route::post('/editAddress', [AddressDetails::class, 'editAddress']);
Route::post('/updateAddressDetails', [AddressDetails::class, 'updateAddressDetails']);
Route::post('/deleteAddress', [AddressDetails::class, 'deleteAddress']);

Route::get('/getbreedDetails', [Breed::class, 'getbreedDetails']);

Route::post('/petcaregiverdetails', [petcaregiver::class, 'petcaregiverdetails']);
Route::post('/addratingdetails', [petcaregiver::class, 'addratingdetails']);



Route::get('/getTermsandConditions', [Terms::class, 'getTermsandConditions']);
Route::post('/addTermsandConditions', [Terms::class, 'addTermsandConditions']);
Route::post('/addPrivacyPolicy', [Terms::class, 'addPrivacyPolicy']);
Route::post('/addAboutYou', [Terms::class, 'addPrivacyPolicy']);
Route::post('/addHelp', [Terms::class, 'addHelp']);
Route::post('/updateBooking', [ServiceBooking::class, 'updateBooking']);
Route::post('/careGiverServiceList', [ServiceBooking::class, 'careGiverServiceList']);
Route::post('/petOwnerServiceList', [ServiceBooking::class, 'petOwnerServiceList']);//updateExpiredService
Route::get('/updateExpiredService', [ServiceBooking::class, 'updateExpiredService']);//
Route::get('cancellist',[Servicebooking::class, 'cancellist']);
Route::post('bookingotpverify',[Servicebooking::class, 'bookingotpverify']);

Route::post('getbookingdetails',[Servicebooking::class, 'getbookingdetails']);
Route::post('/updateRating', [ServiceBooking::class, 'updateRating']);//

Route::get('/getsortingdetails', [ServiceBooking::class, 'getsortingdetails']);
Route::get('/getWalkingAvaialbleTimes', [ServiceBooking::class, 'getWalkingAvaialbleTimes']);
Route::post('/updateDeviceToken', [User::class, 'updateDeviceToken']);
Route::get('userratingreviews',[Servicebooking::class, 'userratingreviews']);

Route::get('/notificationlist',[Servicebooking::class, 'notificationlist']);
Route::post('notificationView', [Servicebooking::class, 'notificationView']);

Route::post('/apiGetWalletDetails', [WalletDetails::class, 'apiGetWalletDetails']);
Route::post('/apiGetWalletAmount', [WalletDetails::class, 'apiGetWalletAmount']);
Route::get('getwalletDetails',[WalletDetails::class, 'getwalletDetails']);
Route::get('getusername',[WalletDetails::class, 'getusername']);
Route::post('/addPayment', [WalletDetails::class, 'addPayment']);
Route::post('/editWallet', [WalletDetails::class, 'editWallet']);
Route::post('/updateWalletDetails', [WalletDetails::class, 'updateWalletDetails']);
Route::post('/deleteWallet', [WalletDetails::class, 'deleteWallet']);
Route::post('apiGetBankOTP',[WalletDetails::class, 'apiGetBankOTP']);
Route::post('apiVerifyBankOTP',[WalletDetails::class, 'apiVerifyBankOTP']);

Route::post('/apiGetCardDetails', [CardDetails::class, 'apiGetCardDetails']);
Route::get('getCardDetails',[CardDetails::class, 'getCardDetails']);
Route::get('getusername',[CardDetails::class, 'getusername']);
Route::post('/addCardDetails', [CardDetails::class, 'addCardDetails']);
Route::post('/editCardDetails', [CardDetails::class, 'editCardDetails']);
Route::post('/updateCardDetails', [CardDetails::class, 'updateCardDetails']);
Route::post('/deleteCard', [CardDetails::class, 'deleteCard']);

Route::get('/changeroles', [User::class, 'changeroles']);

Route::get('/getpayoutfreqency', [Payout::class, 'getpayoutfreqency']);

Route::get('getbankdetails',[Bankdetails::class, 'getbankdetails']);
Route::post('addbankdetails',[Bankdetails::class, 'addbankdetails']);
Route::get('getuserdetails',[Bankdetails::class, 'getuserdetails']);
Route::post('editbankdetails',[Bankdetails::class, 'editbankdetails']);
Route::post('updatebankDetails',[Bankdetails::class, 'updatebankDetails']);
Route::post('deletebanklist',[Bankdetails::class, 'deletebanklist']);
Route::get('getbankdetailslist',[Bankdetails::class, 'getbankdetailslist']);

Route::get('getcurmonservicedetails',[Servicebooking::class, 'getcurmonservicedetails']);

/*-----promo code details----*/
Route::post('/apiPromoCode', [PromoCode::class, 'apiPromoCode']);
Route::get('getpromocodelist',[PromoCode::class, 'getpromocodelist']);
Route::post('addpromocode',[PromoCode::class, 'addpromocode']);
Route::post('editpromocode',[PromoCode::class, 'editpromocode']);
Route::post('updatepromocode',[PromoCode::class, 'updatepromocode']);
Route::post('deletpromocodelist',[PromoCode::class, 'deletpromocodelist']);
Route::get('getpromocodeusers',[PromoCode::class, 'getpromocodeusers']);
Route::post('addpromocodeusers',[PromoCode::class, 'addpromocodeusers']);
Route::get('getpromocodeuserslist',[PromoCode::class, 'getpromocodeuserslist']);
Route::post('promoCodeStatus',[PromoCode::class, 'promoCodeStatus']);
Route::post('promoCodeApply',[PromoCode::class, 'promoCodeApply']);


Route::get('getsetavailablelist',[Setavailable::class, 'getsetavailablelist']);
Route::post('/saveSetavailability', [Setavailable::class, 'saveSetavailability']);
Route::post('/deleteSetavailability', [Setavailable::class, 'deletesetavailablelist']);
Route::post('/setavailableapi', [Setavailable::class, 'getsetavailablelistapi']);

Route::get('getbreakingeventlist',[BreakingEvent::class, 'getbreakingeventlist']);
Route::post('addservicegeventdetails',[BreakingEvent::class, 'addservicegeventdetails']);
Route::post('deleteserviceevent',[BreakingEvent::class, 'deleteserviceevent']);
Route::get('getserviceevent',[BreakingEvent::class, 'getserviceevent']);

/*-----Breaking Events details----*/
Route::get('breakingeventlist',[BreakingEvent::class, 'breakingeventlist']);
Route::post(' addbreakingevents',[BreakingEvent::class, 'addbreakingevents']);
Route::post('/editBreakingevent', [BreakingEvent::class, 'editBreakingevent']);
Route::post('/updateBreakingDetails', [BreakingEvent::class, 'updateBreakingDetails']);
Route::post('deleteBreakingtypelist',[BreakingEvent::class, 'deleteBreakingtypelist']);
Route::post('BreakingEventsStatus',[BreakingEvent::class, 'BreakingEventsStatus']);

Route::post('petcareGalleryapi',[Petcareimage::class, 'petcareGalleryapi']);
Route::post('getpetcareGallery',[Petcareimage::class, 'getpetcareGallery']);
/*---Cancellation Reason---*/
Route::get('/getCancellationReason', [CancellationReason::class, 'getCancellationReason']);
Route::post('/addCancellationReason', [CancellationReason::class, 'addCancellationReason']);
Route::post('/editCancellationReason', [CancellationReason::class, 'editCancellationReason']);
Route::post('/updateCancellationReason', [CancellationReason::class, 'updateCancellationReason']);
Route::post('/deleteReason', [CancellationReason::class, 'deleteReason']);
Route::post('cancellationReasonStatus',[CancellationReason::class, 'cancellationReasonStatus']);