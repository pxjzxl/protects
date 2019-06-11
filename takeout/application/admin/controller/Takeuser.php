<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\Model\LoginPwd as LoginPwdModel;

class Takeuser extends Common
{
	public function index() {
		$new = new LoginPwdModel;
		$data = $new->paginate(10);
		$page = $data->render();
		return view('/takeuser/index',['data' => $data,'page' => $page]);
	}

	public function tdel() {
		$id = request()->param('id');
		$new = new LoginPwdModel;
		$succ = $new->where('id',$id)->delete();
		if(!$succ) {
			$this->error('删除失败');
		}
		$this->success('删除成功');
	}
}