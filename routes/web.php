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
    return view('pocetna');
});


Route::get('predaja-oglasa',function () {
    return view('predaja-oglasa');
})->middleware('auth');

Route::get('settings', 'ProfileController@showSettings');

Route::get('help',function () {
    return view('help');
});

//Route::get('getDepartmentList','DropdownController@smerovi');
Route::get('getYearList', 'DropdownController@godine');
Route::get('getSubjectList', 'DropdownController@predmeti');
Route::get('getDepartmentList','DropdownController@smerovi');
Route::post('predaja-oglasa','ProfileController@addNewSubject');

Route::post('obrisi-oglas','ProfileController@deleteSubject');
Route::post('/azuriraj-oglas','ProfileController@updateSubjectInfo');

Route::get('pretraga',['as' => 'pretraga', 'uses' =>'SearchController@search']);

Auth::routes();

Route::get('/home','HomeController@showRequests')->middleware('auth');


Route::post('settings','ProfileController@updateAvatar');
Route::get('moji-predmeti', 'ProfileController@showMySubjects');
Route::get('redirect/{provider}', 'Auth\SocialAuthController@redirect');
Route::get('callback/{provider}', 'Auth\SocialAuthController@callback'); 
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

Route::get('/request/verify/public/{confirmation_code}','ConfirmationController@confirmPublicRequest');

Route::post('/posaljiAnketu', 'RatingController@posaljiAnketu');

Route::get('/zahtev/oceni/{javni}/{sifZahteva}/{sifOceni}/{confirmation_code}','RatingController@rate');

Route::post('/zabeleziPreporuku','RatingController@zabeleziPreporuku');

Route::post('/zavrsiAnketu','RatingController@zavrsiAnketu');

Route::get('/promena-mejla/potvrdi/{newEmail}/{confirmation_code}', 'ConfirmationController@confirmNewEmail');

Route::get('/validProfileSettings','ProfileController@validProfileSettings');

Route::get('/audio','AudioController@showAudioSubjects');

Route::get('/audio/{nazivSmera}/{godina}/{nazivPredmeta}','AudioController@showAudioSubjectMenu');

Route::get('/audioSubject/selectYear','AudioController@getYearClasses');

Route::get('/audio/{nazivSmera}/{godina}/{nazivPredmeta}/{vrsta}/{skolskaGodina}/{brojDvocasa}/{brojCasa}','AudioController@showAudioPlayer');

Route::get('/getAudioFile', 'AudioController@getAudioFile');

Route::get('/getPlaybackName', 'AudioController@getPlaybackName');

