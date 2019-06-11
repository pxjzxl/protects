<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::group('home',[
	'position' => ['index2/position/position',['method' => 'get|post']],
	'logout' => ['index2/index2/login_sms/logout',['method' => 'get|post']],
	'userinfo' => ['index2/user_info/userinfo',['method' => 'get|post']],
	'login_sms' => ['index2/login_sms/login_sms',['method' => 'get|post']],
	'sendcode' => ['index2/login_sms/sendcode',['method' => 'get|post']],
	'login_pwd' => ['index2/login_pwd/login_pwd',['method' => 'get|post']],
	'getcaptcha' => ['index2/login_pwd/getcaptcha',['method' => 'get|post']],
	'index_category' => ['index2/index_category/index_category',['method' => 'get|post']],
	'shops' => ['index2/llist/shops',['method' => 'get|post']],
	'search_shops' => ['index2/llist/search_shops',['method' => 'get|post']],
]);

