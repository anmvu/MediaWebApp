<?php
use App\Http\Middleware\AdminMiddleware;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
   
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/login','Auth\AuthController@getLogin');
    Route::post('/login','Auth\AuthController@postLogin');
    
	Route::get('/home',function(){
		return view('home');
	});

	Route::get('/logout','Auth\AuthController@logOut');

	Route::get('/loan','LoansController@getLoanForm');
	Route::post('/loan','LoansController@postLoan');

	Route::get('/profile',"UsersController@profile");

	Route::get('/return',"LoansController@needReturning");

	Route::get('/issues',"IssuesController@listIssues");

	Route::group(['middleware' => AdminMiddleware::class], function () {
		Route::get('/users',"UsersController@index");
		Route::get('users/add','UsersController@addUser');
		Route::post('users/add','UsersController@postUser');
		Route::get('users/remove','UsersController@removeUser');
		Route::get('users/reactivate','UsersController@reactivateUser');

		Route::get('/types',"TypesController@index");
		Route::get('types/add','TypesController@addType');
		Route::post('types/add','TypesController@postType');
		Route::get('types/remove','TypesController@removeType');

		Route::get('/assets',"AssetsController@index");
		Route::get('assets/add','AssetsController@addAsset');
		Route::post('assets/add','AssetsController@postAsset');
		Route::get('assets/remove','AssetsController@removeAsset');

		Route::get('/attributes',"AttributesController@index");
		Route::get('attributes/add','AttributesController@addAsset');
		Route::post('attributes/add','AttributesController@postAsset');
		Route::get('attributes/remove','AttributesController@removeAsset');
	});
	//Route::get('/users',['middleware' => AdminMiddleware::class, 'uses'=>'UsersController@index']);
});



