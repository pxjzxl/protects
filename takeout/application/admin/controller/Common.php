<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin as AdminModel;
use think\Db;

class Common extends Controller
{
	public $is_check_rule = true;		//标识是否超级管理员，是不进行权限认证，是进行权限认证
	public $menu = array();		//用来储存首页导航菜单的信息
	//调用构造方法
	public function _initialize() {
		$c = request()->controller();		//获取当前访问的控制器
		$a = request()->action();		//获取当前访问的方法
		$id = session('userId');		
		$is_login = session('?is_login');		//判断是否登录
		$ac = "$c/$a";		//把获取的控制器和方法连接成一个访问地址,例如:admin/common/login
		if(empty($id) && $is_login !== true && $ac != "Common/login" && $ac != "Common/getentry") {
			$this->error('请先登录',url('/admin/login'));
		}
		$new = new AdminModel;		//实例化模型
		$rs = $new->field('b.role_id')->alias('a')->join('take_admin_role b','a.id=b.admin_id','left')->find($id);		//使用链表查询，主要是为了获取管理员用户对应的角色ID
		if($rs['role_id'] == 1) {		//1代表超级管理员
			$this->is_check_rule = false;		//不进行权限认证
			$sql = "select * from take_rule";
			$rules = Db::query($sql);		//获取所有的权限
		} else {
			//代表普通管理员，要进行权限认证
			$rule = $new->field('c.rule_id')->alias('a')->join('take_admin_role b','a.id=b.admin_id','left')->join('take_role_rule c','b.role_id=c.role_id','left')->select($id);		//使用链表查询，作用是获取管理员用户ID对应的角色，再获取对应的权限ID
			foreach ($rule as $key => $value) {		//将查询出来的权限ID转换为以为数组
				$rule_ids[] = $value['rule_id'];
			}
			$rule_ids = implode(',', $rule_ids);		//将一维数组转换为字符串格式，方便使用in语法
			$sql = "select * from take_rule where id in ($rule_ids)";		//查询权限列表，获取权限名称，条件是当前登录的管理员扮演的角色对应的权限ID
			$rules = Db::query($sql);
		}
		//将查询出来对应的module,controller,action拼凑成一个URL地址,并且把它放到导航栏菜单信息中
		foreach ($rules as $key => $value) {
				$this->menu['rrs'][] = strtolower($value['module'].'/'.$value['controller'].'/'.$value['action']);
				if($value['is_show']==1) {		//如果显示，将他存储到导航栏菜单中(is_show字段作用是：那些URL地址需要传参数，我们不宜放到导航栏菜单,比如对应的商品删除列表点击删除就是传的ID给del页面)
					$this->menu['menu'][] = $value;
					if($rs['role_id'] ==1) {
						$this->is_check_rule = false;
					}
				}
			}
			if($this->is_check_rule) {
			$m = request()->module();		//获取当前模型 admin
			$mvc = "$m/$c/$a";		//拼凑成一个地址
			//管理员默认拥有权限
			$this->menu['rrs'][] = 'admin/index/index';		//首页
			$this->menu['rrs'][] = 'admin/common/login';		//登录
			$this->menu['rrs'][] = 'admin/index/welcome';		//欢迎页
			$this->menu['rrs'][] = 'admin/common/logout';		//注销
			$action = strtolower("$m/$c/$a");		//把获取当前的地址转换为小写
			if(!in_array($action, $this->menu['rrs'])) {		//根据当前访问的地址和该管理员拥有的权限进行比对
				$this->error('没有访问权限');
			}
		}
	}

	//登录
	public function login() {
		if(request()->isPost()) {
			$username = request()->post('username');
			$password = request()->post('password');
			$captcha = request()->post('captcha');
			$res = AdminModel::login($username,$password);
			if($res === false) {
				$this->error('用户名或密码错误');
			}
			if(!captcha_check($captcha)) {
				$this->error('验证码错误');
			} 
			$this->success('登录成功',url('/admin/index'));
		}
		return view('/common/login');
	}

	//输出验证码
	public function getentry() {
		$config = [
		 // 验证码位数
        'length'        => 4,
    ];
		$captcha = new \think\captcha\Captcha($config);
		return $captcha->entry();
	}

	public function logout() {
		AdminModel::LogOut();
		$this->success('注销成功',url('/admin/login'));
	}

}