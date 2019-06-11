<?php 
namespace app\admin\model;

use think\Model;

class Store extends Model
{
	protected $field = array('store','admin_id');

	public function admin() {
		return $this->belongsTo('Admin');
	}
}