<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('frontend.layout.header');
//});



Route::get('/unautorized', function () {
   return view('errors.403');
});


Auth::routes(['verify' => true]);



Route::get('/redirect',[App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

Route::get('/redirectfacebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectTofacebook']);
Route::get('/callbackfacebook', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderfacebook']);

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/admin/userlogin', [App\Http\Controllers\Auth\LoginController::class, 'userlogin']);


Route::group([
  'prefix' => '{locale?}', 
  'where' => ['locale' => '[a-zA-Z]{2}'], 
  'middleware' => 'setlocale'],function()
    {
        Route::get('/admin/login', function () {
                return view('auth.login');
        });

    });
    Route::post('/admin/upload_file', [App\Http\Controllers\Settings\SettingsController::class, 'upload_file'])->name('upload_file');
        Route::post('/admin/removelotimg', [App\Http\Controllers\Auctions\AuctionsController::class, 'removelotimg'])->name('removelotimg');
    // Route::post('/admin/uploadImage', [App\Http\Controllers\Settings\SettingsController::class, 'uploadImage'])->name('uploadImage');

   
   


Route::group([
  'prefix' => '{locale?}', 
  'where' => ['locale' => '[a-zA-Z]{2}'], 
  'middleware' => 'setlocale'],function()
{
Route::group(['middleware' =>['auth', 'admin']], function()
{
    Route::prefix('admin')->group(function () {
   
    Route::get('/adminlogout', [App\Http\Controllers\User\UserController::class, 'adminlogout'])->name('adminlogout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('adminhome');
    // Role
    Route::get('/deleterole/{id}',[App\Http\Controllers\User\UserController::class, 'deleterole']);
    Route::get('roles', [App\Http\Controllers\User\UserController::class, 'roles'])->name('roles');
    Route::get('role/{id?}',[App\Http\Controllers\User\UserController::class, 'role'])->name('role');
    Route::post('/saverole', [App\Http\Controllers\User\UserController::class, 'saverole'])->name('saverole');
     Route::get('role_access/{id?}',[App\Http\Controllers\User\UserController::class, 'role_access'])->name('role_access');
      Route::post('/saveroleaccess', [App\Http\Controllers\User\UserController::class, 'saveroleaccess'])->name('saveroleaccess');
     //Users
    Route::get('/deleteuser/{id}', [App\Http\Controllers\User\UserController::class, 'deleteuser'])->name('deleteuser');
    Route::get('users', [App\Http\Controllers\User\UserController::class, 'users'])->name('users');
    Route::get('user/{id?}', [App\Http\Controllers\User\UserController::class, 'user'])->name('user');
    Route::post('/saveuser', [App\Http\Controllers\User\UserController::class, 'saveuser'])->name('saveuser');
    Route::post('/userstatus', [App\Http\Controllers\User\UserController::class, 'userstatus'])->name('userstatus');
    Route::get('/profile',[App\Http\Controllers\User\UserController::class, 'profile'])->name('profile');
    Route::post('/upload_dp', [App\Http\Controllers\User\UserController::class, 'upload_dp'])->name('upload_dp');
    Route::get('/userprofile/{id?}', [App\Http\Controllers\User\UserController::class, 'userprofile'])->name('userprofile');
    Route::get('/getstates/{id}',[App\Http\Controllers\User\UserController::class, 'getstates'])->name('getstates'); 
    Route::get('/getcities/{id}',[App\Http\Controllers\User\UserController::class, 'getcities'])->name('getcities');
    Route::get('/get_states/{id}',[App\Http\Controllers\User\UserController::class, 'get_states'])->name('get_states'); 
    Route::get('/get_cities/{id}',[App\Http\Controllers\User\UserController::class, 'get_cities'])->name('get_cities');

    Route::get('/get_deliverstates/{id}',[App\Http\Controllers\User\UserController::class, 'get_deliverstates'])->name('get_deliverstates'); 
    Route::get('/get_delivercities/{id}',[App\Http\Controllers\User\UserController::class, 'get_delivercities'])->name('get_delivercities');
    Route::post('/filter_bids', [App\Http\Controllers\Auctions\BidsController::class, 'filter_bids'])->name('filter_bids');
      
    //Auctions
    Route::get('/auctions', [App\Http\Controllers\Auctions\AuctionsController::class, 'auctions'])->name('auctions');
    Route::get('/deleteauction/{id}', [App\Http\Controllers\Auctions\AuctionsController::class, 'deleteauction'])->name('deleteauction');
    Route::get('/auction/{id?}', [App\Http\Controllers\Auctions\AuctionsController::class, 'auction'])->name('auction');
    Route::post('/saveauction', [App\Http\Controllers\Auctions\AuctionsController::class, 'saveauction'])->name('saveauction');
    Route::get('/auctiondetail/{id?}', [App\Http\Controllers\Auctions\AuctionsController::class, 'auctiondetail'])->name('auctiondetail');
    
    Route::get('/getstates/{id}',[App\Http\Controllers\Auctions\AuctionsController::class, 'getstates'])->name('getstates'); 
    Route::get('/getcities/{id}',[App\Http\Controllers\Auctions\AuctionsController::class, 'getcities'])->name('getcities'); 
    
    //Lot
     Route::get('/lots', [App\Http\Controllers\Auctions\AuctionsController::class, 'lots'])->name('lots');
    Route::get('/deletelot/{id}', [App\Http\Controllers\Auctions\AuctionsController::class, 'deletelot'])->name('deletelot');
    Route::get('/lot/{id?}', [App\Http\Controllers\Auctions\AuctionsController::class, 'lot'])->name('lot');
    Route::get('/lotdetail/{id?}', [App\Http\Controllers\Auctions\AuctionsController::class, 'lotdetail'])->name('lotdetail');

    Route::post('/savelot', [App\Http\Controllers\Auctions\AuctionsController::class, 'savelot'])->name('savelot');

    Route::get('/lot_photo_modal', [App\Http\Controllers\Auctions\AuctionsController::class, 'lot_photo_modal'])->name('lot_photo_modal');

     // Route::post('/lot_photo_modal', [App\Http\Controllers\Auctions\AuctionsController::class, 'lot_photo_modal'])->name('lot_photo_modal');

    Route::post('/savelotphoto', [App\Http\Controllers\Auctions\AuctionsController::class, 'savelotphoto'])->name('savelotphoto');

    Route::get('/getmodel/{id}',[App\Http\Controllers\Auctions\AuctionsController::class, 'getmodel'])->name('getmodel'); 
    
    
   //Bids
     Route::get('/bids', [App\Http\Controllers\Auctions\BidsController::class, 'bids'])->name('bids');
    Route::get('/approvebid/{id?}', [App\Http\Controllers\Auctions\BidsController::class, 'approvebid'])->name('approvebid');
    Route::post('/bidstatus', [App\Http\Controllers\Auctions\BidsController::class, 'bidstatus'])->name('bidstatus');
    Route::get('/todayBids', [App\Http\Controllers\Auctions\BidsController::class, 'todayBids'])->name('todayBids');

    //Settings
    Route::get('/settings', [App\Http\Controllers\Settings\SettingsController::class, 'settings'])->name('settings');
    Route::get('/setting/{id?}', [App\Http\Controllers\Membership\MembershipController::class, 'setting'])->name('setting');
    Route::post('/saveportalsettings', [App\Http\Controllers\Settings\SettingsController::class, 'saveportalsettings'])->name('saveportalsettings');

    Route::get('/contactus', [App\Http\Controllers\Settings\SettingsController::class, 'contactus'])->name('contactusadmin');
    Route::get('/deletecontactus/{id}', [App\Http\Controllers\Settings\SettingsController::class, 'deletecontactus'])->name('deletecontactus');


    //Purchased History
    Route::get('/purchased', [App\Http\Controllers\Auctions\BidsController::class, 'purchased'])->name('purchased');
    Route::get('/purchasedhistory/{id}', [App\Http\Controllers\Auctions\BidsController::class, 'purchasedhistory'])->name('purchasedhistory');


    //Invoice

    Route::get("/makeinvoice/{id}",[App\Http\Controllers\Invoice\InvoiceController::class, 'makeinvoice'])->name('makeinvoice');
    Route::get("/invoicedetail/{id}",[App\Http\Controllers\Invoice\InvoiceController::class, 'invoicedetail'])->name('invoicedetail');
    Route::get("/printinvoicedetail/{id}",[App\Http\Controllers\Invoice\InvoiceController::class, 'printinvoicedetail'])->name('printinvoicedetail');
    Route::get("/invoice/{id}",[App\Http\Controllers\Invoice\InvoiceController::class, 'invoice'])->name('invoice');
    Route::get("/invoices",[App\Http\Controllers\Invoice\InvoiceController::class, 'invoices'])->name('invoices');
    Route::post("/saveinvoice",[App\Http\Controllers\Invoice\InvoiceController::class, 'saveinvoice'])->name('saveinvoice');
    Route::get('/deleteinvoice/{id}', [App\Http\Controllers\Invoice\InvoiceController::class, 'deleteinvoice'])->name('deleteinvoice');
    

    // Deposit Routes
    Route::get('/deposits', [App\Http\Controllers\Deposit\DepositController::class, 'deposits'])->name('deposits');
    Route::post('/depositstatus', [App\Http\Controllers\Deposit\DepositController::class, 'depositstatus'])->name('depositstatus');
    Route::get('/deletedeposit/{id?}', [App\Http\Controllers\Deposit\DepositController::class, 'deletedeposit'])->name('deletedeposit');
    Route::get('/depositdetail/{id?}', [App\Http\Controllers\Deposit\DepositController::class, 'depositdetail'])->name('depositdetail');


    //Buy Now Routes
    Route::get('/buynow', [App\Http\Controllers\Auctions\BidsController::class, 'buynow'])->name('buynow');
    Route::get('/approvebuynow/{id?}', [App\Http\Controllers\Auctions\BidsController::class, 'approvebuynow'])->name('approvebuynow');
    Route::get('/rejectrequest/{id?}', [App\Http\Controllers\Auctions\BidsController::class, 'rejectrequest'])->name('rejectrequest');
    Route::post('/buynowstatus', [App\Http\Controllers\Auctions\BidsController::class, 'buynowstatus'])->name('buynowstatus');

    //Model Routes
    Route::get('/models', [App\Http\Controllers\Model\ModelController::class, 'models'])->name('models');
    Route::get('/model/{id?}', [App\Http\Controllers\Model\ModelController::class, 'model'])->name('model');
    Route::post('/savemodel', [App\Http\Controllers\Model\ModelController::class, 'savemodel'])->name('savemodel');
    Route::get('/deletemodel/{id}', [App\Http\Controllers\Model\ModelController::class, 'deletemodel'])->name('deletemodel');

   
   //Make Rotues
     
    Route::get('/makes', [App\Http\Controllers\Model\ModelController::class, 'makes'])->name('makes');
    Route::get('/make/{id?}', [App\Http\Controllers\Model\ModelController::class, 'make'])->name('make');
    Route::post('/savemake', [App\Http\Controllers\Model\ModelController::class, 'savemake'])->name('savemake');
    Route::get('/deletemake/{id}', [App\Http\Controllers\Model\ModelController::class, 'deletemake'])->name('deletemake');

    // Faqs Route

    Route::get('/faqs', [App\Http\Controllers\Faqs\FaqsController::class, 'faqs'])->name('faqs');
    Route::get('/faq/{id?}', [App\Http\Controllers\Faqs\FaqsController::class, 'faq'])->name('faq');
    Route::post('/savefaq', [App\Http\Controllers\Faqs\FaqsController::class, 'savefaq'])->name('savefaq');

    // Fees Route

    Route::get('/coparts',[App\Http\Controllers\Fees\FeesController::class, 'coparts'])->name('coparts');
    Route::get('/copart/{id?}',[App\Http\Controllers\Fees\FeesController::class, 'copart'])->name('copart');
    Route::post('/savecopart',[App\Http\Controllers\Fees\FeesController::class, 'savecopart'])->name('savecopart');
    Route::get('/deletecopart/{id}',[App\Http\Controllers\Fees\FeesController::class, 'deletecopart'])->name('deletecopart');
    Route::get('/iaais',[App\Http\Controllers\Fees\FeesController::class, 'iaais'])->name('iaais');
    Route::get('/iaai/{id?}',[App\Http\Controllers\Fees\FeesController::class, 'iaai'])->name('iaai');
    Route::post('/saveiaai',[App\Http\Controllers\Fees\FeesController::class, 'saveiaai'])->name('saveiaai');
    Route::get('/deleteiaai/{id}',[App\Http\Controllers\Fees\FeesController::class, 'deleteiaai'])->name('deleteiaai');

    // Shipping Fees

    Route::get('/view_shippment',[App\Http\Controllers\Shipping\ShippingController::class, 'view_shippment'])->name('view_shippment');
    Route::get('/add_shipping/{id?}',[App\Http\Controllers\Shipping\ShippingController::class, 'add_shipping'])->name('add_shipping');
    Route::post('/saveshipping',[App\Http\Controllers\Shipping\ShippingController::class, 'saveshipping'])->name('saveshipping');
    Route::get('/deleteshipping/{id}',[App\Http\Controllers\Shipping\ShippingController::class, 'deleteshipping'])->name('deleteshipping');


     // Ground Shipping

    Route::get('/ground_shipping',[App\Http\Controllers\Groundshipping\GroundshippingController::class, 'ground_shipping'])->name('ground_shipping');
    Route::get('/addground_shipping/{id?}',[App\Http\Controllers\Groundshipping\GroundshippingController::class, 'addground_shipping'])->name('addground_shipping');
    Route::post('/savegroundshipping',[App\Http\Controllers\Groundshipping\GroundshippingController::class, 'savegroundshipping'])->name('savegroundshipping');
    Route::get('/deletegroundshipping/{id}',[App\Http\Controllers\Groundshipping\GroundshippingController::class, 'deletegroundshipping'])->name('deletegroundshipping');



     // Ocean Shipping

    Route::get('/ocean_shipping',[App\Http\Controllers\Oceanshipping\OceanshippingController::class, 'ocean_shipping'])->name('ocean_shipping');
    Route::get('/addocean_shipping/{id?}',[App\Http\Controllers\Oceanshipping\OceanshippingController::class, 'addocean_shipping'])->name('addocean_shipping');
    Route::post('/saveoceanshipping',[App\Http\Controllers\Oceanshipping\OceanshippingController::class, 'saveoceanshipping'])->name('saveoceanshipping');
     Route::get('/deleteoceanshipping/{id}',[App\Http\Controllers\Oceanshipping\OceanshippingController::class, 'deleteoceanshipping'])->name('deleteoceanshipping');

     // SEO

    Route::get('/view_seo',[App\Http\Controllers\SEO\SEOController::class, 'view_seo'])->name('view_seo');
    Route::get('/add_seo/{id?}',[App\Http\Controllers\SEO\SEOController::class, 'add_seo'])->name('add_seo');
    Route::post('/saveseo',[App\Http\Controllers\SEO\SEOController::class, 'saveseo'])->name('saveseo');
    Route::get('/deleteseo/{id}',[App\Http\Controllers\SEO\SEOController::class, 'deleteseo'])->name('deleteseo');
    //Email Templete
    Route::get('/templete',[App\Http\Controllers\EmailTemplete\EmailTempleteController::class, 'templete'])->name('templete');
    Route::get('/templetes/{id?}',[App\Http\Controllers\EmailTemplete\EmailTempleteController::class, 'templetes'])->name('templetes');
    Route::post('/savetemplete',[App\Http\Controllers\EmailTemplete\EmailTempleteController::class, 'savetemplete'])->name('savetemplete');
    Route::get('/deletetemplete/{id}',[App\Http\Controllers\EmailTemplete\EmailTempleteController::class, 'deletetemplete'])->name('deletetemplete');
});

});
});

Route::get('/', function () {
    return redirect(app()->getLocale());
});
Route::get('/login',[App\Http\Controllers\Frontend\HomeController::class,'userloginPage'])->name('login');
Route::group(['middleware' =>['auth','verified']], function()
{
    Route::get('/userdashboard',[App\Http\Controllers\Frontend\HomeController::class, 'userdashboard'])->name('userdashboard');
});
Route::group([
  'prefix' => '{locale?}', 
  'where' => ['locale' => '[a-zA-Z]{2}'], 
  'middleware' => 'setlocale'],function()
{
  Route::get('/forgot_password',[App\Http\Controllers\Auth\LoginController::class,'forgot_password'])->name('forgot_password');

// FrontEnd Routes
// Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'home']);
Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'home'])->name('home');
Route::get('/login',[App\Http\Controllers\Frontend\HomeController::class,'userloginPage'])->name('login');

Route::group(['middleware' =>['auth','verified']], function()
{
// user Dashboard
Route::get('/userdashboard',[App\Http\Controllers\Frontend\HomeController::class, 'userdashboard'])->name('userdashboard');

//Bids Routes
Route::post('/placebid',[App\Http\Controllers\Frontend\LotController::class, 'placebid'])->name('placebid');
Route::get('/userlogout',[App\Http\Controllers\Frontend\HomeController::class, 'userlogout'])->name('userlogout'); 

//Payment History
Route::get('/paymenthistory',[App\Http\Controllers\Frontend\HomeController::class, 'paymenthistory'])->name('paymenthistory'); 
Route::post('/paymentpagination',[App\Http\Controllers\Frontend\HomeController::class, 'paymentpagination'])->name('paymentpagination'); 

//betting
Route::get('/bettings/{type?}/{id?}',[App\Http\Controllers\Frontend\HomeController::class, 'bettings'])->name('bettings'); 

//Document Routes
Route::get('/document/{id?}',[App\Http\Controllers\Frontend\HomeController::class,'document'])->name('document'); 
Route::post('/savedocument',[App\Http\Controllers\Frontend\HomeController::class, 'savedocument'])->name('savedocument'); 

//Profile Settings
Route::get('/usersettings/{id?}',[App\Http\Controllers\Frontend\SettingsController::class, 'usersettings'])->name('usersettings'); 
Route::post('/updateprofile',[App\Http\Controllers\Frontend\SettingsController::class, 'updateprofile'])->name('updateprofile'); 
Route::post('/updatepassword',[App\Http\Controllers\Frontend\SettingsController::class, 'updatepassword'])->name('updatepassword'); 
  
//Deposit Routes
Route::get('/deposit',[App\Http\Controllers\Frontend\DepositController::class, 'deposit'])->name('deposit'); 
Route::post('/savedeposit',[App\Http\Controllers\Frontend\DepositController::class, 'savedeposit'])->name('savedeposit'); 

//Bookmark Routes
Route::post('/savebookmark',[App\Http\Controllers\Frontend\FilterController::class, 'savebookmark'])->name('savebookmark'); 

Route::get('/paymentdetail/{id?}/{type?}',[App\Http\Controllers\Frontend\DepositController::class, 'paymentdetail'])->name('paymentdetail'); 
Route::post('/senddeposit',[App\Http\Controllers\Frontend\DepositController::class, 'senddeposit'])->name('senddeposit'); 

Route::get('/bookmarks',[App\Http\Controllers\Frontend\FilterController::class, 'bookmarks'])->name('bookmarks'); 

 

Route::get('generatepdf/{id?}', [App\Http\Controllers\Frontend\SettingsController::class, 'generatepdf'])->name('generatepdf');

//buy now.
Route::post('/buynow',[App\Http\Controllers\Frontend\LotController::class, 'buynow'])->name('buynow');

Route::get('/buynowlist/{id?}',[App\Http\Controllers\Frontend\HomeController::class, 'buynowlist'])->name('buynowlist'); 


//Dealer Routes
Route::get('/view_dealer',[App\Http\Controllers\Frontend\DealerController::class, 'view_dealer'])->name('view_dealer'); 
Route::post('/savedealer',[App\Http\Controllers\Frontend\DealerController::class, 'savedealer'])->name('savedealer'); 
 Route::post('/uploadfile',[App\Http\Controllers\Frontend\DealerController::class,'uploadfile']);
 Route::get('/dealer/{id?}',[App\Http\Controllers\Frontend\DealerController::class, 'dealer'])->name('dealer');
Route::get('/getmodel/{id}',[App\Http\Controllers\Frontend\DealerController::class, 'getmodel'])->name('getmodel'); 
Route::get('/deletedealer/{id}',[App\Http\Controllers\Frontend\DealerController::class, 'deletedealer'])->name('deletedealer'); 
Route::get('/dealer_deatil/{id?}',[App\Http\Controllers\Frontend\DealerController::class, 'dealer_deatil'])->name('dealer_deatil'); 
Route::get('/lot_photo_modal', [App\Http\Controllers\Frontend\DealerController::class, 'lot_photo_modal']);

Route::post('/savedealerphoto', [App\Http\Controllers\Frontend\DealerController::class, 'savedealerphoto']);
Route::post('/removelotimg', [App\Http\Controllers\Frontend\DealerController::class, 'removelotimg'])->name('removelotimg');


});

Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class,'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class,'resend'])->name('verification.resend');
//User Registration
Route::get('/userregister',[App\Http\Controllers\Frontend\HomeController::class,'userregisterPage'])->name('userregisterPage');;

// Route::post('/userregister',[App\Http\Controllers\Frontend\HomeController::class, 'userregister']);
Route::post('/userregister',[App\Http\Controllers\Auth\RegisterController::class, 'userregister'])->name('userregister');

Route::post('/customerlogin',[App\Http\Controllers\Frontend\HomeController::class, 'userlogin'])->name('userlogin');
//frontend All lots
Route::get('/getalllot',[App\Http\Controllers\Frontend\LotController::class, 'getalllot'])->name('getalllot');
Route::get('/lotdetail/{id?}',[App\Http\Controllers\Frontend\LotController::class, 'lotdetail'])->name('lotdetail');
Route::post('/bid_value',[App\Http\Controllers\Frontend\LotController::class, 'bid_value'])->name('bid_value');
Route::post('/zip_code_search',[App\Http\Controllers\Frontend\LotController::class, 'zip_code_search'])->name('zip_code_search');

Route::post('/ocean_shipping_search',[App\Http\Controllers\Frontend\LotController::class, 'ocean_shipping_search'])->name('ocean_shipping_search');


//Search Routes
Route::get('/lotsearch',[App\Http\Controllers\Frontend\FilterController::class, 'lotsearch'])->name('lotsearch');
Route::any('/filter/{page?}',[App\Http\Controllers\Frontend\FilterController::class, 'filter'])->name('filter');
Route::post('/searchbar',[App\Http\Controllers\Frontend\FilterController::class, 'searchbar'])->name('searchbar');
Route::get('/getbrandmodels/{id?}',[App\Http\Controllers\Frontend\FilterController::class, 'getbrandmodels'])->name('getbrandmodels');


Route::post('/getmultiplemodel',[App\Http\Controllers\Frontend\FilterController::class, 'getmultiplemodel'])->name('getmultiplemodel');
Route::post('/multiplefilter',[App\Http\Controllers\Frontend\FilterController::class, 'multiplefilter'])->name('multiplefilter');

//Pagination
Route::post('/searchpagination',[App\Http\Controllers\Frontend\FilterController::class, 'searchpagination'])->name('searchpagination'); 

//Contact Us

Route::get('/contactus',[App\Http\Controllers\Frontend\HomeController::class, 'contactus'])->name('contactus');
Route::post('/sendmessage',[App\Http\Controllers\Frontend\HomeController::class, 'sendmessage'])->name('sendmessage');


//Faqs
Route::get('/faq',[App\Http\Controllers\Frontend\HomeController::class, 'faq'])->name('faq');
Route::post('/get_faqs',[App\Http\Controllers\Frontend\HomeController::class, 'get_faqs']);

//How to work
Route::get('/howto',[App\Http\Controllers\Frontend\HomeController::class, 'howto'])->name('howto');;
Route::get('/terms',[App\Http\Controllers\Frontend\HomeController::class, 'terms'])->name('terms');;
Route::get('/privacy',[App\Http\Controllers\Frontend\HomeController::class, 'privacy'])->name('privacy');;
Route::get('/fees',[App\Http\Controllers\Frontend\HomeController::class, 'fees'])->name('fees');;


Route::get('/langsession/{id}',[App\Http\Controllers\Frontend\HomeController::class, 'langsession']);

Route::get('/copylotdata',[App\Http\Controllers\Frontend\ParserController::class, 'copylotdata'])->name('copylotdata');

Route::get('/scrape',[App\Http\Controllers\Frontend\HomeController::class, 'scrape']);


});

Route::post('/ground_shipping_search',[App\Http\Controllers\Frontend\LotController::class, 'ground_shipping_search'])->name('ground_shipping_search');

// Dealer





Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\Frontend\SettingsController@switchLang']);

Route::get('/switchLang/{lang}',[App\Http\Controllers\Frontend\SettingsController::class, 'switchLang']);

Route::get('/test/{lang}',[App\Http\Controllers\Frontend\SettingsController::class, 'test']);


Route::get('/getstates/{id?}',[App\Http\Controllers\Frontend\SettingsController::class, 'getstates'])->name('getstates'); 
Route::get('/getcities/{id?}',[App\Http\Controllers\Frontend\SettingsController::class, 'getcities'])->name('getcities');