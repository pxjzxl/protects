<?php 
namespace app\admin\model;

use think\Model;

class AdminRole extends Model
{
	protected $field = array('role_id','admin_id');

	public function admin() {
		return $this->belongsTo('Admin');
	}
}