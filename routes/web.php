<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Users\HtmlController@index')->name('/');
// Route::get('/', function () {
//   $likes =  \App\Like::where('user_id','=',Auth::user()->id)->where('song_id','=',$row1->id)->first();
//   $likess =  \App\Like::where('like','=',1)->get();
//     return view('user.index' , compact('likes','likess'));
// })->name('/');
//User Routes
Auth::routes(['verify' => true]);


Route::get('/logout', 'Users\UserController@logout');
Route::get('/logoutt', 'Users\UserController@logoutt')->name('logoutt');

Route::get('/home', 'HomeController@index')->name('home');
 
 Route::get('/vendor', 'HomeController@vendorLogout')->name('vendor');

// Stripe Paymant Method


Route::post('/stripe/{id}', 'StripePaymentController@stripe')->name('stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
Route::get('confirm', 'StripePaymentController@confirm')->name('confirm');

// End paymant

//HTML Controller 

Route::get('/browser', 'Users\HtmlController@browser')->name('browser');
Route::get('/chart', 'Users\HtmlController@chart')->name('chart');
Route::get('/artist', 'Users\HtmlController@artist')->name('artist');
Route::get('/search', 'Users\HtmlController@search')->name('search');
Route::get('/tracks', 'Users\HtmlController@tracks')->name('tracks');
Route::get('/profile', 'Users\HtmlController@profile')->name('profile');
Route::get('/likes', 'Users\HtmlController@likes')->name('likes');
Route::get('/playList', 'Users\HtmlController@playList')->name('playList');
Route::get('/artist/details/{id}', 'Users\HtmlController@artist_details')->name('artist.details');
Route::get('/track/details/{id}', 'Users\HtmlController@track_details')->name('track.details');

//Serch Bar
Route::get('/search/kewword', 'Users\HtmlController@searchKeyword')->name('search.keyword');
Route::get('/search/artist', 'Users\HtmlController@searchArtist')->name('search.artist');


// End Serch Bar

//USER PROFILE
Route::get('/userprofile', 'HomeController@userprofile')->name('userprofile');
Route::post('/user/profile/update', 'HomeController@userprofileupdate')->name('user.profile.update');
Route::post('/user/password/update', 'HomeController@userpasswordupdate')->name('user.password.update');


// Song ADD to Cart

Route::post('/cart', 'CartContorller@cart')->name('cart');
Route::get('/cart/show', 'CartContorller@index')->name('cart.show');
Route::get('/cart/delete/{id}', 'CartContorller@destroy')->name('cart.delete');



//Song LIke 


//End Like



// Paypal Intigration 


Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));


//End Paypall


// Admin routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Setting routes
     Route::get('/setting/create', 'Users\Admin\SettingController@create')->name('setting.create');
      Route::post('/setting/store', 'Users\Admin\SettingController@store')->name('setting.store');
       Route::post('/setting/reset/password', 'Users\Admin\SettingController@resetpassword')->name('setting.resset.password');


     //Country Routes
     Route::post('/country/store', 'Users\Admin\SettingController@country_store')->name('country.store');
      Route::get('/country/create', 'Users\Admin\SettingController@country_create')->name('country.create');
      Route::get('/country/show', 'Users\Admin\SettingController@country_show')->name('country.show');
      Route::get('/country/edit/{id}', 'Users\Admin\SettingController@country_edit')->name('country.edit');
      Route::post('/country/update/{id}', 'Users\Admin\SettingController@country_update')->name('country.update');
    Route::get('/country/delete/{id}', 'Users\Admin\SettingController@country_destroy')->name('country.delete');


     //City Routes
     Route::post('/city/store', 'Users\Admin\SettingController@city_store')->name('city.store');
      Route::get('/city/create', 'Users\Admin\SettingController@city_create')->name('city.autorsonglist');
       Route::get('/city/show', 'Users\Admin\SettingController@city_show')->name('city.show');
        Route::get('/city/edit/{id}', 'Users\Admin\SettingController@city_edit')->name('city.edit');
      Route::post('/city/update/{id}', 'Users\Admin\SettingController@city_update')->name('city.update');
       Route::get('/city/delete/{id}', 'Users\Admin\SettingController@city_destroy')->name('city.delete');

   //UserList
      Route::get('/userlist', 'Users\UserController@userlist')->name('userlist');
      Route::get('/user/status/{status}/{id}', 'Users\UserController@status')->name('user.status');
       Route::get('/userdetails/{id}', 'Users\UserController@userdetails')->name('userdetails');
       Route::get('/userlistblock', 'Users\UserController@userlistblock')->name('userlistblock');
       Route::get('/user/delete/{id}', 'Users\UserController@userdelete')->name('user.delete');
 //AutorList
       Route::get('/autorlist', 'Users\UserController@autorlist')->name('autorlist');
      Route::get('/autor/status/{status}/{id}', 'Users\UserController@autorstatus')->name('autor.status');
      Route::get('/autordetails/{id}', 'Users\UserController@autordetails')->name('autordetails');
       Route::get('/songdetails/{id}', 'Users\UserController@songdetails')->name('songdetails');
       Route::get('/author/delete/{id}', 'Users\UserController@delete')->name('author.delete');
        Route::get('/autorlistblock', 'Users\UserController@autorlistblock')->name('autorlistblock');

      //Autor SOng List Active

       Route::get('/autorstatus', 'Users\Admin\AdminController@autorstatus')->name('autorstatus');
      Route::get('/autor/song/status/{status}/{id}', 'Users\Admin\AdminController@status')->name('autor.song.status');
      Route::get('/autorsonglist', 'Users\Admin\AdminController@autorsonglist')->name('autorsonglist');
       Route::get('/pending/autorsonglist/', 'Users\Admin\AdminController@autorsonglist2')->name('pending.autorsonglist');


      //Song 
       Route::get('/song/category', 'SongController@index')->name('song.category');
       Route::post('/song/category/store', 'SongController@store')->name('song.category.store');
       Route::get('/song/category/edit/{id}', 'SongController@edit')->name('song.category.edit');
        Route::post('/song/category/update/{id}', 'SongController@update')->name('song.category.update');
         Route::get('/song/category/delete/{id}', 'SongController@destroy')->name('song.category.delete');


        //Album Routes
    Route::get('/autor/album/status/{status}/{id}', 'Users\Vendor\AlbumSongController@status')->name('autor.album.status');
      Route::get('almumstatus', 'Users\Vendor\AlbumSongController@almumstatus')->name('almumstatus');
      Route::get('/admin/song/album', 'Users\Vendor\AlbumSongController@albumreportadmin')->name('admin.song.album');
       Route::get('/pending/song/album', 'Users\Vendor\AlbumSongController@albumreportadmin2')->name('pending.song.album');
    Route::get('/admin/single/album/{id},{autor_id}', 'Users\Vendor\AlbumSongController@adminsinglealbum')->name('admin.single.album');

    // Auotr Sell SOng 

       Route::get('/sell/song', 'SellSongController@index')->name('sell.song');
       Route::get('/sell/song/show/{id}', 'SellSongController@show')->name('sell.song.show');


       // End Auotr Sell SOng 

// Paymant Setting 

       Route::get('/payamnt/paypal/', 'Users\Vendor\PaymantSettingController@paymantPaypal')->name('paymant.paypal');
       Route::get('/payamnt/bank/details', 'Users\Vendor\PaymantSettingController@paymantBankDetails')->name('paymant.bank.details');
       Route::get('/payamnt/western/union', 'Users\Vendor\PaymantSettingController@paymantWesternUnion')->name('paymant.western.union');


       Route::get('/payamnt/withdraw', 'Users\Vendor\PaymantSettingController@paymantWithDraw')->name('paymant.withdraw');
        Route::get('/payamnt/details/withdraw/{id}', 'Users\Vendor\PaymantSettingController@paymantWithDrawDetails')->name('paymant.details.withdraw');
         Route::get('/payamnt/withdraw/store/{id}', 'Users\Vendor\PaymantSettingController@paymantWithDrawDetailsStore')->name('paymant.withdraw.store');




   

});


// Vendor routes
Route::prefix('vendor')->group(function(){
    Route::get('/vendor', 'Users\Vendor\VendorController@index')->name('vendor.dashboard');
    Route::get('/login', 'Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/register', 'Auth\VendorRegisterController@showRegisterForm')->name('vendor.register');
    Route::post('/register', 'Auth\VendorRegisterController@register')->name('vendor.register.submit');

    //AUtor song

     Route::get('/song/show', 'Users\Vendor\AutorSongController@index')->name('song.show');
     Route::get('/song/pending/show', 'Users\Vendor\AutorSongController@index2')->name('song.pending.show');
     Route::Post('/song/store', 'Users\Vendor\AutorSongController@store')->name('song.store');
      Route::get('/song/destroy/{id}', 'Users\Vendor\AutorSongController@destroy')->name('song.destroy');
       Route::get('/song/index/{id}', 'Users\Vendor\AutorSongController@show')->name('song.index');
        Route::get('/song/eidt/{id}', 'Users\Vendor\AutorSongController@edit')->name('song.edit');
     Route::Post('/song/update/{id}', 'Users\Vendor\AutorSongController@update')->name('song.update');

//ALbumSOng
        Route::get('/song/album', 'Users\Vendor\AlbumSongController@index')->name('song.album');
         Route::get('/song/pending/album', 'Users\Vendor\AlbumSongController@index2')->name('song.pending.album');
         Route::post('/album/store', 'Users\Vendor\AlbumSongController@store')->name('albumstore');
   
       Route::get('/album/delete/{id}', 'Users\Vendor\AlbumSongController@destroy')->name('album.delete');
       Route::get('/album/index/{id}', 'Users\Vendor\AlbumSongController@create')->name('album.index');
       Route::get('/album/edit/{id}', 'Users\Vendor\AlbumSongController@edit')->name('album.edit');
        Route::post('/album/update/{id}', 'Users\Vendor\AlbumSongController@update')->name('album.update');


       //Autor Profile

        Route::get('/autor/profile/{id}', 'Users\Vendor\VendorController@profile')->name('autor.profile');
        Route::post('/profile/update', 'Users\Vendor\VendorController@update')->name('profile.update');


        //Paymant Setting
         Route::get('/payamnt/index/', 'Users\Vendor\PaymantSettingController@index')->name('paymant.index');
          Route::post('/payamnt/details/', 'Users\Vendor\PaymantSettingController@store')->name('paymant.details');
           Route::get('/payamnt/edit/{id}', 'Users\Vendor\PaymantSettingController@edit')->name('paymant.edit');
            Route::post('/payamnt/update/{id}', 'Users\Vendor\PaymantSettingController@update')->name('payamnt.update');

        //End Paymant Setting


      // Auotr Sell SOng 

      Route::get('/sell/song/details', 'SellSongController@sellDetails')->name('sell.song.details');



       // End Auotr Sell SOng 


});
Route::get('/song/edit/{id}', 'Users\Vendor\AutorSongController@edit')->name('song.edit');
 Route::get('/fetch/data/{id}', 'Auth\VendorRegisterController@fetchdata');
  Route::get('/city/data/{id}', 'Users\Vendor\VendorController@citydata');

  Route::post('/like', 'CartContorller@like')->name('like');
  Route::post('/follow', 'CartContorller@follow')->name('follow');
  Route::post('/playSong', 'CartContorller@playSong')->name('playSong');




