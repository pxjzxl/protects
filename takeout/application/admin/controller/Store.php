<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Store as StoreModel;
// use app\admin\model\Admin as AdminModel;
use think\Db;

class Store extends Common
{
	public function index() {
		$data = StoreModel::paginate(1);
		$page = $data->render();
		$this->assign('data',$data);
		$this->assign('page',$page);
		return $this->fetch();
	}
}