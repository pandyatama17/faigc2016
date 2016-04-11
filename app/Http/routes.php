<?php
use App\Member;
use App\Program;
use App\MemberType;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('home', 'MainController@home');
Route::get('/', 'MainController@home');
Route::any('/program', 'MainController@program');
Route::any('/schedule', 'MainController@schedule');
Route::any('/accomodation', 'MainController@accomodation');
Route::any('/gallery', 'MainController@gallery');
Route::any('/contact', 'MainController@contact');
Route::any('/participants', 'MainController@participants');
Route::get('/sampleemail', function()
{
   return view('mail.registration_success')
   ->with('first_name', 'gans')
   ->with('title', 'Mr.')
   ->with('family_name', 'parah')
   ->with('key', 'ASQYJSKJHSDKJH');
});
Route::any('twitter',function()
{
   return view('modules.twitter');
});

Route::any('/register','RegisterController@index');
Route::any('/register/welcome','RegisterController@intro');
Route::any('/register/new','RegisterController@newRegister');
Route::get('/register/new/atendee_information','RegisterController@atendeeInformation');
Route::post('/register/new/store','RegisterController@storeRegistration');
Route::post('/register/update','RegisterController@updateRegistration');
Route::any('/register/new/program/','RegisterController@program');
Route::post('/register/new/storeProgram','RegisterController@storeProgram');
Route::get('/register/new/hotel','RegisterController@hotel');
Route::post('/register/new/hotel/store', 'RegisterController@storeHotelReservation');
Route::any('/register/new/subatendee', 'RegisterController@subatendee');
Route::post('/register/new/subatendee/store', 'RegisterController@storeSubatendee');
Route::any('/register/new/payment', 'RegisterController@payment');
Route::any('/register/new/success', 'RegisterController@success');

Route::get('register/delegate',function()
{
   Session::put('registype', '1');
   return Redirect::to('register/welcome');
});
Route::get('register/companion',function()
{
   Session::put('registype', '9');
   return Redirect::to('register/welcome');
});
Route::any('register/type', function()
{
   if(Session::get('regstep')== 'personal_data')
   {
      return view('registration.view.registrationtype')
      ->with('member_types', MemberType::all())
      ->with(array('flow'=>array('email'=> Session::get('email'))))
      ->with('step', 'regtype')
      ->with('pagin', 'registration');
   }
});

Route::any('register/atendee_information',function()
{
   if(Session::get('regstep') == 'personal_data')
   {
      return Redirect::to('register/new/atendee_information');
   }
   else
   {
      $val = Member::find(Session::get('uid'));
      return view('registration.view.personaldata')
      ->with('member_types', MemberType::all())
      ->with('val',$val)
      ->with('step', 'regtype')
      ->with('pagin', 'registration');
   }
});
Route::any('register/program',function()
{
   if(Session::get('regstep') == 'personal_data')
   {
      return Redirect::to('register/new/program');
   }
   else
   {
      $programs = Program::all();
      return view('registration.view.programs')
      ->with('programs', $programs)
      // ->with('val',$val)
      ->with('step', 'programs')
      ->with('pagin', 'registration');
   }
});
Route::any('registration', 'RegistrationController@index');
Route::post('registration/store', 'RegistrationController@store');
Route::post('registration/getregistration/{id}', 'RegistrationController@show');
Route::get('registration/verifyemail&email={mail}', function ($mail)
{
   $m = App\Member::where('email','=',$mail)->pluck('id');

   if(empty($m))
   {
      $arr = array('valid' => true );
   }
   else {
      $arr = array('valid' => false );
   }

   echo json_encode($arr);
});
Route::get('/registration/success&id={id}', 'RegistrationController@show');
Route::get('/payment/later&id={id}', 'RegistrationController@later');
Route::get('/showdummyemail/payment-later', function()
{
   return view('mail.payment-later');
});
