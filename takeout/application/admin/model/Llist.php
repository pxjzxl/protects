<?php 
namespace app\admin\model;

use think\Model;

class Llist extends Model
{
	protected $field = array('name','category','address','phone','is_new','is_premium','distance','float_delivery_free','promotion_info','description','float_minimum_order_amount','image_path','sell_id');

	//模型关联
	public function supports() {
		return $this->hasMany('Supports');
	}

	public function license() {
		return $this->hasOne('License');
	}
}