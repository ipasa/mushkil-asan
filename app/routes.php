<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'as'    =>  'home',
    'uses'  =>  'HomeController@showWelcome'
));
Route::get('@{username}', array(
    'as'    =>  'profile-user',
    'uses'  =>  'profileController@user'
));

/*Ask a Question*/
Route::get('/ask-qusetion', array(
    'as'    =>  'ask-question',
    'uses'  =>  'QuestionController@index'
));
Route::post('/ask-qusetion', array(
    'as'    =>  'ask-question',
    'uses'  =>  'QuestionController@getCreate'
));

/*Showing a Single Question*/
Route::get('/question/{qid}', array(
    'as'    =>  'single-question',
    'uses'  =>  'QuestionController@singleQuestion'
));

/*
* Authenticate group
*/
Route::group(array('before'=>'auth'), function(){

    Route::group(array('before'=>'csrf'), function(){
        Route::post('/changepassword',array(
            'as'    =>  'change-password',
            'uses'  =>  'UserManageController@postchangePassword'
        ));
    });
    Route::get('/logout', array(
        'as'    =>  'logout',
        'uses'  =>  'UserManageController@logoutUser'
    ));
    Route::get('/changepassword',array(
        'as'    =>  'change-password',
        'uses'  =>  'UserManageController@getchangePassword'
    ));
});

/*
 * Unauthenticate group
*/
Route::group(array('before'=>'guest'), function(){

    /*
     * Protected From CSRF
    */
    Route::group(array('before'=>'csrf'), function(){

        /*
         * Create a new account
        */
        Route::post('/registration', array(
            'as'    =>  'registration',
            'uses'  =>  'UserManageController@postregisterUser'
        ));

        /*
         * Login a account(Post)
        */
        Route::post('/login', array(
            'as'    =>  'login',
            'uses'  =>  'UserManageController@postLoginUser'
        ));

    });

    Route::get('/registration', array(
        'as'    =>  'registration',
        'uses'  =>  'UserManageController@getregisterUser'
    ));
    Route::get('/activate/{code}',array(
        'as'    =>  'activateAccount',
        'uses'  =>  'UserManageController@activateAccountByEmail'
    ));

    Route::get('/login', array(
        'as'    =>  'login',
        'uses'  =>  'UserManageController@getLoginUser'
    ));

});