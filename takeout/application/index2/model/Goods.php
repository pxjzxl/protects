<?php 
namespace app\index2\model;

use think\Model;

class Goods extends Model
{
	protected $field = array('name','icon','llist_id');

	public function llist() {
		return $this->belongsTo('Llist');
	}

	public function foods() {
		return $this->hasMany('Foods');
	}
}