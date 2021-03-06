<?php

Route::get('/', array(
    'as'    =>  'home',
    'uses'  =>  'HomeController@showWelcome'
));
Route::get('/solved', array(
    'as'    =>  'solved',
    'uses'  =>  'HomeController@showWelcomeSolved'
));
Route::get('/top-view', array(
    'as'    =>  'top-view',
    'uses'  =>  'HomeController@showWelcomeTopview'
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

/*Serach a item*/
Route::get('/search', array(
    'as'    =>  'search-item',
    'uses'  =>  'SearchController@getSearch'
));
Route::get('/results/{all}', array(
    'uses'  =>  'SearchController@results'
));
Route::post('/search', array(
    'as'    =>  'postSearch',
    'uses'  =>  'SearchController@postSearch'
));

/*Showing a Single Question*/
Route::get('/question/{qid}', array(
    'as'    =>  'single-question',
    'uses'  =>  'QuestionController@singleQuestion'
));

/*Vote a Question*/
Route::get('vote/{qid}', array(
    'as'    =>  'vote-question',
    'uses'  =>  'VoteController@voteQuestion'
));
Route::get('vote-down/{qid}', array(
    'as'    =>  'vote-down-question',
    'uses'  =>  'VoteController@voteDownQuestion'
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
        Route::post('answer', array(
            'as'    =>  'answer',
            'uses'  =>  'AnswerController@answerQuestion'
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
    Route::get('/user-questions', array(
        'as'    =>  'ypquestion',
        'uses'  =>  'profileController@personalQuestions'
    ));

    Route::get('question/{questionid}/edit', array(
        'as'    =>  'edit-question',
        'uses'  =>  'profileController@editQuestions'
    ));
    Route::get('question/{questionid}/update', array(
        'as'    =>  'update-question',
        'uses'  =>  'profileController@updateQuestions'
    ));

    Route::get('update-profile', array(
        'as'    =>  'update-profile',
        'uses'  =>  'profileController@updateProfile'
    ));
    Route::get('main-update-profile',array(
        'as'    =>  'main-update-profile',
        'uses'  =>  'profileController@mainUpdateProfile'
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

    /*forget-password*/
    Route::get('forget-password', array(
        'as'      =>  'forget-password',
        'uses'    =>  'UserManageController@forgetPass'
    ));
    Route::get('forget-password/recover/{code}', array(
        'as'      =>  'account-recover',
        'uses'    =>  'UserManageController@getRecover'
    ));

    Route::post('forget-password', array(
        'as'      =>  'forget-password',
        'uses'    =>  'UserManageController@postforgetPass'
    ));


});

/*Footer Menu Route*/
Route::get('about-us', array(
    'as'    =>  'about-us',
    'uses'  =>  'FooterController@aboutus'
));
Route::get('rules', array(
    'as'    =>  'rules',
    'uses'  =>  'FooterController@rules'
));
Route::get('creator', array(
    'as'    =>  'creator',
    'uses'  =>  'FooterController@creator'
));