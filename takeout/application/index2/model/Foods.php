<?php 
namespace app\index2\model;

use think\Model;

class Foods extends Model
{
	protected $field = array('name','price','oldPrice','description','sellCount','rating','info','goods_id');

	public function goods () {
		return $this->belongsTo('Goods');
	}
}