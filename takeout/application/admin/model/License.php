<?php 
namespace app\admin\model;

use think\Model;

class License extends Model
{
	protected $field = array('catering_service_license_image','business_license_image','llist_id');

	public function Llist() {
		return $this->belongsTo('Llist');
	}
}