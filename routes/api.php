<?php

use Illuminate\Http\Request;

Route::group([
    'namespace' => 'Api\v1',
    'prefix' => 'v1'
], function(){
    Route::get('users', 'UserApiController@users');
    Route::get('users/{user}', 'UserApiController@user');
    Route::get('users/{user}/posts', 'UserApiController@posts');

    Route::get('posts', 'PostsApiController@posts');
    Route::get('posts/{post}', 'PostsApiController@post');
    Route::get('posts/{post}/comments', 'PostsApiController@comments');

    Route::get('comments', 'CommentsApiController@comments');
    Route::get('comments/{comment}', 'CommentsApiController@comment');
});
