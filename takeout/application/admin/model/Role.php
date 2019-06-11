<?php 
namespace app\admin\model;

use think\Model;

class Role extends Model
{
	protected $field = array('id','role');

	public function rolerule() {
		return $this->hasMany('RoleRule');
	}
}