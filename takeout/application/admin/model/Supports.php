<?php 
namespace app\admin\model;

use think\Model;

class Supports extends Model
{
	protected $field = array('description','icon_color','icon_name','name','_id','llist_id');

	public function Llist() {
		return $this->belongsTo('Llist');
	} 
}