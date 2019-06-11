<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Role as RoleModel;
use app\admin\model\Rule as RuleModel;
use app\admin\model\RoleRule as RoleRuleModel;
use think\Db;

class Role extends Common
{
	public function index() {
		$user = new RoleModel;
		$data = $user->paginate(1);
		$page = $data->render();
		return view('role/index',['data' => $data,'page' => $page]);
	}

	public function roadd() {
		if(request()->isPost()) {
			$data = request()->post();
			$role = request()->post('role');
			$rq = RoleModel::where('role',$role)->select();
			if($rq) {
				$this->error('角色已存在');
			}
			$datas = implode(',',$data['son']);
			$op = RuleModel::where('parent_id',0)->select();
			$pid = RuleModel::where("id in ($datas)")->select();
			foreach ($op as $key => $v) {
				foreach ($pid as $key => $value) {
					static $dt = array();
					if($v['id'] == $value['parent_id']) {
						$dt[] = $v['id'];
						$dt[] = $value['id'];
					}
				}
			}
			$newArry = array_unique($dt);
			// dump($newArry);
			$data = [
				'role' => $role,
			];
			$user = new RoleModel;
			$res = $user->save($data);
			if(!$res) {
				$this->error('繁忙,请稍后重试');
			}
			foreach ($newArry as $key => $valued) {
				$dts = $user->rolerule()->save(['rule_id' => $valued]);
			}
			if(!$dts) {
				$this->error('添加失败');
			}
			$this->success('添加成功');
		}
		$sql = "select * from take_rule";
		$dt = Db::query($sql);
		return view('role/add',['dt' => $dt]);
	}

	public function roedit() {
		$id = request()->param('id');
		$sql = "select * from take_rule";
		$dt = Db::query($sql);
		$data = RoleModel::where('id',$id)->select();
		$new = new RoleModel;
		$dd = $new->field('a.role,b.role_id,b.rule_id,c.*')->alias('a')->join('take_role_rule b','a.id=b.role_id','left')->join('take_rule c','b.rule_id=c.id','left')->select($id);
		return view('/role/roedit',['dt' => $dt,'data' => $data,'dd' => $dd]);
	}

	public function update() {
		$id = request()->param('id');
		$data = request()->post();
		$datas = implode(',',$data['son']);
			$op = RuleModel::where('parent_id',0)->select();
			$pid = RuleModel::where("id in ($datas)")->select();
			foreach ($op as $key => $v) {
				foreach ($pid as $key => $value) {
					static $dt = array();
					if($v['id'] == $value['parent_id']) {
						$dt[] = $v['id'];
						$dt[] = $value['id'];
					}
				}
			}
			$newArry = array_unique($dt);
			$role = [
				'role' => $data['role'],
			];
			$user = new RoleModel;
			if($user->where('role',$data['role'])->where('id','neq',$id)->find()) {
				$this->error('已存在管理员');
			}
			$res = $user->where('id',$id)->update($role);
			if($res === false) {
				$this->error('繁忙,请稍后重试');
			}
			$dl = $user->rolerule()->where('role_id',$id)->delete();
			$userr = RoleModel::get($id);
			foreach ($newArry as $key => $valued) {
				$dts = $userr->rolerule()->save(['rule_id' => $valued]);
			}
			if(!$dts) {
				$this->error('更新失败');
			}
			$this->success('更新成功');
	}

}