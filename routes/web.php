<?php

// 商城首页
Route::get('/', 'PagesController@root')->name('root');

// 用户模块脚手架路由
Auth::routes();

// 用户邮箱验证中间件
Route::group(['middleware' => 'auth'], function() {
    // 提示用户激活邮箱
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
    // 用户邮箱激活
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    // 用户主动请求发送激活邮件
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');

    Route::group(['middleware' => 'email_verified'], function() {
        // 用户收货地址列表
        Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
        // 用户新增收货地址视图渲染
        Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
        // 用户新增收货地址逻辑
        Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
        // 用户编辑收货地址页面渲染
        Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
        // 用户编辑收货地址逻辑
        Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
        // 删除用户收货地址逻辑
        Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');
    });

});