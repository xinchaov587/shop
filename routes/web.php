<?php

// 商城首页
Route::get('/', 'PageController@root')->name('root');

// 用户模块脚手架路由
Auth::routes();