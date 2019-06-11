<?php 
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
	protected $field = array('id','username','password','email','create_time','nickname');
	protected $_validate = array(
		array('username','require','用户名称必须填写'),
		array('password','require','密码必须填写'),
		);

	static public function login($username,$password) {
		$res = self::getByUsername($username);
		if(!empty($res)) {
			if($res->checkPassword($password)) {
				session('is_login',true);
				session('userId',$res->id);
				return true;
			}
		}
				return false;
	}

	public function checkPassword($password) {
		if(self::encryptPassword($password) === $this->getData('password')) {
			return true;
		}
		return false;
	}

	static public function encryptPassword($password) {
		return sha1(md5($password).'salt');
	}

	static public function LogOut() {
		session(null);
	}

	public function adminrole() {
		return $this->hasOne('AdminRole');
	}

	public function store() {
		return $this->hasOne('Store');
	}
}