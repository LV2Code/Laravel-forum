<?php


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('{provider}/auth', [ 'uses' => 'SocialsController@auth', 'as' => 'social.auth' ]);

Route::get('/{provider}/redirect', [ 'uses' => 'SocialsController@auth_callback', 'as' => 'social.callback' ]);

Route::resource( 'forums', 'ForumsController' );

Route::resource( 'channels', 'ChannelsController' );


Route::group([ 'middleware' => 'auth' ], function(){

    Route::resource( 'discussions', 'DiscussionsController', ['except' => ['show'] ] );

    Route::post('/discussions/reply/{id}', [ 'uses' => 'DiscussionsController@reply', 'as' => 'discussions.reply' ]);
    

    Route::get('/reply/like/{id}', [ 'uses' => 'RepliesController@like', 'as' => 'reply.like' ]);

    Route::get('/reply/unlike/{id}', [ 'uses' => 'RepliesController@unlike', 'as' => 'reply.unlike' ]);

    Route::get( '/reply/correct_answer/{id}', [ 'uses' => 'RepliesController@correct_answer', 'as' => 'correct.answer' ]);
    
    
    Route::get('/discussion/watch/{id}', [ 'uses' => 'WatchersController@watch', 'as' => 'discussion.watch' ]);

    Route::get('/discussion/unwatch/{id}', [ 'uses' => 'WatchersController@unwatch', 'as' => 'discussion.unwatch' ]);
});



Route::get('/discussions/unanswered', [ 'uses' => 'DiscussionsController@unanswered', 'as' => 'discussions.unanswered' ]);

Route::get('/discussions/answered', [ 'uses' => 'DiscussionsController@answered', 'as' => 'discussions.answered' ]);

Route::get('/discussions/user/{id}', [ 'uses' => 'DiscussionsController@user', 'as' => 'discussions.user' ]);

Route::get('/discussions/{id}', [ 'uses' => 'DiscussionsController@show', 'as' => 'discussions.show' ]);
