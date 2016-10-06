<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('layout');
});



Route::get('predaja-oglasa',function () {
    return view('predaja-oglasa');
})->middleware('auth');

Route::get('settings',function () {
    return view('profile-settings');
})->middleware('auth');

Route::get('help',function () {
    return view('help');
})->middleware('auth');

//Route::get('getDepartmentList','DropdownController@smerovi');
Route::get('getYearList', 'DropdownController@godine');
Route::get('getSubjectList', 'DropdownController@predmeti');
Route::get('getDepartmentList','DropdownController@smerovi');
Route::post('predaja-oglasa','ProfileController@addNewSubject');

Route::get('obrisi-oglas','ProfileController@deleteSubject');
Route::get('azuriraj-oglas','ProfileController@updateSubjectInfo');


Route::get('pretraga',['as' => 'pretraga', 'uses' =>'SearchController@search']);

Auth::routes();

Route::get('/home','HomeController@showRequests')->middleware('auth');


Route::post('settings','ProfileController@updateAvatar');
Route::get('moji-predmeti', 'ProfileController@showMySubjects');
Route::get('redirect', 'SocialAuthController@redirect');
Route::get('callback', 'SocialAuthController@callback');



Route::get('profile/{id}','LayoutProfessorController@showView');

Route::get('/verification-successful', 'ProfileController@napraviProfesora');

Route::post('updateSettings','ProfileController@updateSettings');
Route::post('sendRequest', 'RequestController@sendRequest');
Route::post('acceptRequest', 'RequestController@acceptRequest');
Route::post('rejectRequest','RequestController@rejectRequest');



Route::get('prihvaceni-zahtevi','RequestController@acceptedRequests')->middleware('auth');
Route::get('odbijeni-zahtevi','RequestController@rejectedRequests')->middleware('auth');

Route::get('request/verify/{confirmation_code}','ConfirmationController@confirm');
Route::get('/getUserAtts','LayoutProfessorController@getUserAttributes');

Route::get('/subjectDescription','LayoutProfessorController@showDescription');

Route::get('/resendEmailVerification','Auth\RegisterController@resendEmailVerification');
Route::get('/registration-successful','Auth\RegisterController@registrationSuccessful');

Route::post('/sendGenericRequest','RequestController@saveGenericRequest');

Route::get('/javni-zahtevi','RequestController@publicRequests');

Route::post('/acceptPublicRequest','RequestController@acceptPublicRequest');