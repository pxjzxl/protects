<?php 
namespace app\index2\controller;

use think\Controller;
use app\index2\model\Goods as GoodsModel;
use app\index2\model\Llist as LlistModel;
use app\index2\model\Foods as FoodsModel;


class Goods extends Controller
{
	public function goods() {
		$id = request()->param('id');
		if(!$id) {
			$data = [
			'code' => 1,
			'msg' => '参数错误'
			];
			return json($data);
		}
		$new = new LlistModel;
		$datag = GoodsModel::with('foods')
		->where('llist_id',$id)
		->select();
		$datal = $new->field('name')->where('id',$id)->find();
		$data = [
			'code' => 0,
			'data' => [
				$datal,
				$datag
			],
		];
		return json($data);
	}

	// public function numprice() {
	// 	$userid = session('userId');
	// 	$id = request()->param('id');
	// 	$num = request()->param('num');
	// 	if(!$id) {
	// 		$data = [
	// 		'code' => 1,
	// 		'msg' => '参数错误'
	// 		];
	// 		return json($data);
	// 	}
	// 	$food = FoodsModel::where('id',$id)->find();
	// 	if(!$food) {
	// 		$data = [
	// 		'code' => 1,
	// 		'msg' => '商品不存在'
	// 		];
	// 		return json($data);
	// 	}
	// 	if(!$userid) {
	// 		echo 'meiyoudenglu';
	// 	}
	// 	echo 'dengl';
	// }
}