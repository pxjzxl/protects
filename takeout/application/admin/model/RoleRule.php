<?php 
namespace app\admin\model;

use think\Model;

class RoleRule extends Model
{
	protected $field = array('role_id','rule_id'); 

	public function role() {
		return $this->belongsTo('Role');
	}
}