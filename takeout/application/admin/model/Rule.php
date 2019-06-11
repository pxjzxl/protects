<?php 
namespace app\admin\model;
use think\Model;

class Rule extends Model
{
	protected $field = array('name','module','controller','action','parent_id','is_show');
	protected $_validate = array(
		array('name','require','权限名称不能为空'),
		array('module','require','模型不能为空'),
		array('controller','require','控制器不能为空'),
		array('action','require','方法不能为空'),
		);
}