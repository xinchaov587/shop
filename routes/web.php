<?php

// 商城首页
Route::get('/', 'PagesController@root')->name('root');

// 用户模块脚手架路由
Auth::routes();

// 用户邮箱验证模块
Route::group(['middleware' => 'auth'], function() {
    // 提示用户激活邮箱
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
    // 用户邮箱激活
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    // 用户主动请求发送激活邮件
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');

    // 开始
    Route::group(['middleware' => 'email_verified'], function() {

    });
    // 结束
});