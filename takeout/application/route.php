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

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
use think\Route;
Route::group('admin',[
	'index' => ['admin/index/index',['method' => 'get']],
	'welcome' => ['admin/index/welcome',['method' => 'get']],
	'user' => ['admin/user/index',['method' => 'get']],
	'role' => ['admin/role/index',['method' => 'get']],
	'rule' => ['admin/rule/index',['method' => 'get']],
	'ruadd' => ['admin/rule/ruadd',['method' => 'get|post']],
	'login' => ['admin/common/login',['method' => 'get|post']],
	'roadd' => ['admin/role/roadd',['method' => 'get|post']],
	'goods' => ['admin/goods/index',['method' => 'get']],
	'gadd' => ['admin/goods/gadd',['method' => 'get|post']],
	'gedit' => ['admin/goods/gedit',['method' => 'get|post']],
	'recycle' => ['admin/goods/recycle',['method' => 'get|post']],
	'gdel' => ['admin/goods/gdel',['method' => 'get|post']],
	'gdels' => ['admin/goods/gdels',['method' => 'get|post']],
	'reduction' => ['admin/goods/reduction',['method' => 'get|post']],
	'uadd' => ['admin/user/uadd',['method' => 'get|post']],
	'uedit' => ['admin/user/uedit',['method' => 'get|post']],
	'ruedit' => ['admin/rule/ruedit',['method' => 'get|post']],
	'roedit' => ['admin/role/roedit',['method' => 'get|post']],
	'takeuser' => ['admin/takeuser/index',['method' => 'get']],
	'tdel' => ['admin/takeuser/tdel',['method' => 'get|post']],
	'adel' => ['admin/rule/adel',['method' => 'get|post']],
	'store' => ['admin/store/index',['method' => 'get']],
	]);

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