<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin as AdminModel;

class Index extends Common
{
	//首页
	public function index() {
		$userid = session('userId');
		$user = AdminModel::getById($userid);
		return view('/index/index',['user' => $user,'menu' => $this->menu['menu']]);
	}

	//欢迎页
	public function welcome() {
		$userid = session('userId');
		$user = AdminModel::getById($userid);
		return view('/index/welcome',['user' => $user]);
	}
}