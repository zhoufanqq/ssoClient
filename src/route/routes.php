<?php


Route::group(['prefix' => 'sso-client'], function () {
    Route::get('check', 'zhoufanqq\ssoClient\ssoClientController@check');
});