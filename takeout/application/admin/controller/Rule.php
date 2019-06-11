<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Rule as RuleModel;
use app\admin\model\RoleRule as RoleRuleModel;

class Rule extends Common
{
	//权限列表
	public function index() {
		$ca = new RuleModel;
		$data = $ca->select();
		// $ca::fetchSql()->field('')->alias('a')->
		return view('rule/index',['data' => $data]);
	}

		//权限添加
	public function ruadd() {
		if(request()->isPost()) {
			// $dt = request()->post();
			// $data = [
			// 	'name' => $dt['name'],
			// 	'module' => $dt['module'],
			// 	'module' => $dt['controller'],
			// 	'module' => $dt['action'],
			// ];
			$name = request()->post('name');
			$module = request()->post('module');
			$controller = request()->post('controller');
			$action = request()->post('action');
			$parent = request()->post('parent_id');
			$is_show = request()->post('is_show');
			if(empty($name) || empty($module) || empty($controller) || empty($action)) {
				$this->error('权限添加不能为空',url('/admin/ruadd'));
			}
			$data = [
				'name' => $name,
				'module' => $module,
				'controller' => $controller,
				'action' => $action,
				'parent_id' => $parent,
				'is_show' => $is_show
			];
			$new = new RuleModel;
			// $res = $new->save($dt);
			$res = $new->save($data);
			if(!$res) {
				$this->error('添加失败');
			}
			$this->success('添加成功');
		}
		$ca = new RuleModel;
		$data = $ca->paginate(1);
		$page = $data->render();
		$option = RuleModel::where('parent_id',0)->select();
		$this->assign('page',$page);
		$this->assign('option',$option);
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function ruedit() {
		$id = request()->param('id');
		$data = RuleModel::where('id',$id)->select();
		$option = RuleModel::where('parent_id',0)->select();
		return view('rule/ruedit',['option' => $option,'data' => $data]);
	}

	public function update() {
		$id = request()->param('id');
		$data = request()->post();
		if(empty($data)) {
			$this->error('数据不能为空');
		}
		$ruup = RuleModel::get($id)->update($data);
		if(!$ruup) {
			$this->error('操作繁忙，请稍后重试');
		}
		$this->success('更新成功');
	}

	public function adel() {
		$id = request()->param('id');
		$rule = RuleModel::where('id',$id)->find();
		if($rule['parent_id'] != 0) {
			$rm = RuleModel::where('id',$id)->delete();
			$rrm = RoleRuleModel::where('rule_id',$id)->delete();
			if(!$rm && !$rrm) {
				$this->error('删除失败');
			}
			$this->success('删除成功');
		}
		$pid = RuleModel::where('parent_id',$id)->select();
		if(!$pid) {
			$rm = RuleModel::where('id',$id)->delete();
			$rrm = RoleRuleModel::where('rule_id',$id)->delete();
			if(!$rm && !$rrm) {
				$this->error('删除失败');
			}
			$this->success('删除成功');
		} else {
			$this->error('请先删除子权限');
		}
	}
}