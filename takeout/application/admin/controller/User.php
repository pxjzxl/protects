<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin as AdminModel;
use think\Db;

class User extends Common
{
	//管理员列表
	public function index() {
		// select a.*,c.role from take_admin as a LEFT JOIN take_admin_role b on a.id=b.admin_id  LEFT JOIN take_role c on b.role_id=c.id
		//fetchSql()打印SQL语句
		// $t = $user::query('select a.*,c.role from take_admin as a LEFT JOIN take_admin_role b on a.id=b.admin_id  LEFT JOIN take_role c on b.role_id=c.id');
		$new = new AdminModel;
		$user = $new->field('a.*,c.role')->alias('a')->join('take_admin_role b','a.id=b.admin_id','left')->join('take_role c','b.role_id=c.id')->paginate(1);
		$page = $user->render();
		$this->assign('page',$page);
		$this->assign('user',$user);
		return $this->fetch();
	}

	public function uadd() {
		if(request()->isPost()) {
			$data = request()->post();
			if(empty($data)) {
				$this->error('信息不能为空');
			}
			$new = new AdminModel;
			$datas = [
				'username' => $data['username'],
				'password' => AdminModel::encryptPassword($data['password']),
				'email' => $data['email'],
				'nickname' => $data['nickname'],
				'create_time' =>  strtotime('now'),
			];
			$succ = $new->save($datas);
			if(!$succ) {
				$this->error('操作繁忙，请稍后重试');
			}
			$ar = $new->adminrole()->save(['role_id' => $data['role']]);
			if(!$ar) {
				$this->error('操作失败');
			}
			$this->success('新增管理员成功',url('/admin/uadd'));
		}
		$sql = "select * from take_role";
		$role = Db::query($sql);
		return view('/user/uadd',['role' => $role]);
	}

	public function uedit($id) {
		$sql = "select * from take_role";
		$role = Db::query($sql);
		$new = new AdminModel;
		$alldata = $new->field('a.*,c.role')->alias('a')->join('take_admin_role b','a.id=b.admin_id','left')->join('take_role c','b.role_id=c.id')->select($id);
		$roleid = $new->field('c.*')->alias('a')->join('take_admin_role b','a.id=b.admin_id','left')->join('take_role c','b.role_id=c.id')->select($id);
		return view('/user/uedit',['role' => $role,'alldata' => $alldata,'roleid' => $roleid]);
	}

	public function update() {
		$data = request()->post();
		$id = request()->param('id');
		if(empty($data)) {
			$this->error('数据不能为空');
		}
		//开启事务
		AdminModel::startTrans();
		try {
		$new = AdminModel::get($id);
			$datas = [
				'email' => $data['email'],
				'nickname' => $data['nickname'],
			];
			$succ = $new->where('id',$id)->update($datas);
			$ar = $new->adminrole()->update(['role_id' => $data['role']]);
			//事务提交
			AdminModel::commit();
		} catch (\Exception $e) {
			//事务回滚
			AdminModel::rollback();
		}
			if(!$ar) {
				$this->error('操作失败');
			}
			if($succ === false) {
				$this->error('更新失败');
			}
			$this->success('更新管理员成功',url('/admin/user'));
	}
}