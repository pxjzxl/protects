<?php 
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Llist as LlistModel;
use think\Image;
use app\admin\model\Supports as SupportsModel;
use app\admin\model\License as LicenseModel;
use app\admin\model\AdminRole as AdminRoleModel;
use app\admin\model\Store as StoreModel;

class Goods extends Controller
{
	//商品管理
	public function index() {
		$id = session('userId');
		$roleid = AdminRoleModel::where('admin_id',$id)->find();
		if($roleid['role_id'] == 8) {
		$store = StoreModel::where('admin_id',$id)->find();
		$new = new LlistModel;
		$data = $new->where('status',1)->where('sell_id',$store['id'])->paginate(3);
		$page = $data->render();
		$this->assign('data',$data);
		$this->assign('page',$page);
		return $this->fetch();
		}
		$new = new LlistModel;
		$data = $new->where('status',1)->paginate(3);
		$page = $data->render();
		$this->assign('data',$data);
		$this->assign('page',$page);
		return $this->fetch();
	} 

	//商品添加
	public function gadd() {
		if(request()->isPost()) {
			$dt = request()->post();
			//文件上传并剪切成缩略图
			$name = request()->post('name');
			$img = request()->file('image_path');
			if(empty($img)) {
				$this->error('请选择文件上传');
			}
			$ts = $img->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
			if(!$ts) {
				$this->error($img->getError());
			}

			$image = Image::open($ts);
			$ipath = 'upload'.'/'.$ts->getSaveName();
			$timg = $image->thumb(80,80)->save($ipath);
			$ipaths = '/'.'upload'.'/'.$ts->getSaveName();
			if(!$timg) {
				$this->error('图片上传失败');
			}

			$catering = request()->file('catering_service_license_image');
			if(empty($catering)) {
				$this->error('请选择文件上传');
			}
			$tss = $catering->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
			if(!$tss) {
				$this->error($catering->getError());
			}

			$imagee = Image::open($tss);
			$ipathh = 'upload'.'/'.$tss->getSaveName();
			$timgg = $imagee->thumb(80,80)->save($ipathh);
			$ipathss = '/'.'upload'.'/'.$tss->getSaveName();
			if(!$timgg) {
				$this->error('图片上传失败');
			}

			$business = request()->file('business_license_image');
			if(empty($business)) {
				$this->error('请选择文件上传');
			}
			$tsss = $business->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
			if(!$tsss) {
				$this->error($business->getError());
			}

			$imageee = Image::open($tsss);
			$ipathhh = 'upload'.'/'.$tsss->getSaveName();
			$timggg = $imageee->thumb(80,80)->save($ipathhh);
			$ipathsss = '/'.'upload'.'/'.$tsss->getSaveName();
			if(!$timggg) {
				$this->error('图片上传失败');
			}
			$tu = new LlistModel;
			$data = [
				'name' => $dt['name'],
				'category' => $dt['category'],
				'address' => $dt['address'],
				'phone' => $dt['phone'],
				'is_new' => $dt['is_new'],
				'is_premium' => $dt['is_premium'],
				'distance' => $dt['distance'],
				'float_delivery_free' => $dt['float_delivery_free'],
				'promotion_info' => $dt['promotion_info'],
				'description' => $dt['description'],
				'float_minimum_order_amount' => $dt['float_minimum_order_amount'],
				'image_path' => $ipaths,
			];
			//卖方修改
			$id = session('userId');
			$roleid = AdminRoleModel::where('admin_id',$id)->find();
			if($roleid['role_id'] == 8) {
			$store = StoreModel::where('admin_id',$id)->find();
				$data = [
				'name' => $dt['name'],
				'category' => $dt['category'],
				'address' => $dt['address'],
				'phone' => $dt['phone'],
				'is_new' => $dt['is_new'],
				'is_premium' => $dt['is_premium'],
				'distance' => $dt['distance'],
				'float_delivery_free' => $dt['float_delivery_free'],
				'promotion_info' => $dt['promotion_info'],
				'description' => $dt['description'],
				'float_minimum_order_amount' => $dt['float_minimum_order_amount'],
				'image_path' => $ipaths,
				'sell_id' => $store['id']
				];
			}

			$tus = $tu->save($data);
			if(!$tus) {
				$this->error('商品添加失败');
			}
			//关联写入
			$supports = new SupportsModel;
			$supportsdata = [
				[
				'description' => '准时必达，超时秒赔',
				'icon_color' => '999999',
				'icon_name' => '准',
				'name' => '准时达',
				'_id' => null,
				],

				[
				'description' => '已加入“外卖保”计划，食品安全有保障',
				'icon_color' => '57A9FF',
				'icon_name' => '保',
				'name' => '开发票',
				'_id' => null,
				],

				[
				'description' => '该商家支持开发票，请在下单时填写好发票抬头',
				'icon_color' => '999999',
				'icon_name' => '票',
				'name' => '外卖保',
				'_id' => null,
				],
			];
			$tuspports = $tu->supports()->saveall($supportsdata);
			$tuliecnse = $tu->license()->save(['catering_service_license_image' => $ipathss,'business_license_image' => $ipathsss]);
			if(!$tuspports) {
				$this->error('商品添加失败');
			}
			if(!$tuliecnse) {
				$this->error('商品添加失败');
			}
			$this->success('商品添加成功');
		}
		return $this->fetch();
	}

	//商品修改
	public function gedit($id) {
		$dt = LlistModel::select($id);
		$this->assign('dt',$dt);
		return $this->fetch();
	}

	//商品放入回收站（软删除）
	public function recycle($id) {
		$de = LlistModel::where('id',$id)
		->setField('status',2);
		if(!$de) {
			$this->error('删除商品失败');
		}
		$this->success('删除商品成功');
	}

	//商品回收站
	public function gdel() {
		$new = new LlistModel;
		$data = $new->where('status',2)->paginate(3);
		$page = $data->render();
		$this->assign('data',$data);
		$this->assign('page',$page);
		return $this->fetch();
	}

	//商品真实删除
	public function gdels($id) {
		$gde = LlistModel::get($id);
		$de = $gde->delete();
		if(!$de) {
			$this->error('商品删除失败',url('/admin/gdel'));
		}
		//关联删除
		$tuspports = $gde->supports()->delete();
		$tuliecnse = $gde->license()->delete();
		if(!$tuspports) {
			$this->error('商品删除关联失败',url('/admin/gdel'));
		}
		if(!$tuliecnse) {
			$this->error('商品关联删除失败',url('/admin/gdel'));
		}
		$this->success('商品删除成功',url('/admin/gdel'));
	}

	//商品还原
	public function reduction($id) {
		$de = LlistModel::where('id',$id)
		->setField('status',1);
		if(!$de) {
			$this->error('商品还原失败',url('/admin/gdel'));
		}
		$this->success('商品还原成功',url('/admin/gdel'));
	}

	//商品修改入库
	public function update() {
		$id = request()->param('id');
		$dt = request()->post();
		$img = request()->file('image_path');
		$catering = request()->file('catering_service_license_image');
		$business = request()->file('business_license_image');
		//如果修改页面没有上传图片就默认原来的图片
		if(empty($img) || empty($catering) || empty($business)) {
			$tu = new LlistModel;
			$ipaths = $tu->where('id',$id)
			->field('image_path')
			->select();
			$data = [
			'name' => $dt['name'],
			'category' => $dt['category'],
			'address' => $dt['address'],
			'phone' => $dt['phone'],
			'is_new' => $dt['is_new'],
			'is_premium' => $dt['is_premium'],
			'distance' => $dt['distance'],
			'float_delivery_free' => $dt['float_delivery_free'],
			'promotion_info' => $dt['promotion_info'],
			'description' => $dt['description'],
			'float_minimum_order_amount' => $dt['float_minimum_order_amount'],
			'image_path' => $ipaths,
		];
		$tus = $tu->where('id',$id)->update($data);
		if(!$tu) {
			$this->error('服务繁忙,请稍后尝试',url('/admin/gedit','id='.$id));
		}
		// $license = new licenseModel;
		// $licensedata = $license->where('llist_id',$id)
		// ->field('catering_service_license_image,business_license_image')
		// ->find();
		// // $tli = $tu->license()->where('llist_id',$id)->update(['catering_service_license_image' => $licensedata['catering_service_license_image'],'business_license_image' => $licensedata['business_license_image']]);
		
		// $tuget = LlistModel::get($id);
		// $lcn = $tuget->license()->getByLlistId($id);
		// $lcn->catering_service_license_image = $licensedata['catering_service_license_image'];
		// $lcn->business_license_image = $licensedata['business_license_image'];		 
		// $tli = $lcn->save();
		// if(!$tli) {
		// 	$this->error('更新失败',url('/admin/gedit','id='.$id));
		// }
		$this->success('更新成功',url('/admin/goods'));
		} 
		// else if($img) {
		// 	$ts = $img->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
		// if(!$ts) {
		// 	$this->error($img->getError());
		// }
		// $image = Image::open($ts);
		// $ipath = 'upload'.'/'.$ts->getSaveName();
		// $timg = $image->thumb(80,80)->save($ipath);
		// $ipaths = '/'.'upload'.'/'.$ts->getSaveName();
		// if(!$timg) {
		// 	$this->error('图片上传失败');
		// 	}
		// } else if($business) {
		// 	$tb = $business->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
		// if(!$tb) {
		// 	$this->error($business->getError());
		// }
		// $bimage = Image::open($tb);
		// $bipath = 'upload'.'/'.$tb->getSaveName();
		// $btimg = $bimage->thumb(80,80)->save($bipath);
		// $bipaths = '/'.'upload'.'/'.$tb->getSaveName();
		// if(!$btimg) {
		// 	$this->error('图片上传失败');
		// 	}
		// } else if($catering) {
		// 	$tc = $catering->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
		// if(!$tc) {
		// 	$this->error($catering->getError());
		// }
		// $cimage = Image::open($tc);
		// $cipath = 'upload'.'/'.$tc->getSaveName();
		// $ctimg = $cimage->thumb(80,80)->save($cipath);
		// $cipaths = '/'.'upload'.'/'.$tc->getSaveName();
		// if(!$ctimg) {
		// 	$this->error('图片上传失败');
		// 	}
		// }
		$ts = $img->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
		if(!$ts) {
			$this->error($img->getError());
		}
		$image = Image::open($ts);
		$ipath = 'upload'.'/'.$ts->getSaveName();
		$timg = $image->thumb(80,80)->save($ipath);
		$ipaths = '/'.'upload'.'/'.$ts->getSaveName();
		if(!$timg) {
			$this->error('图片上传失败');
		}

		$tb = $business->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
		if(!$tb) {
			$this->error($business->getError());
		}
		$bimage = Image::open($tb);
		$bipath = 'upload'.'/'.$tb->getSaveName();
		$btimg = $bimage->thumb(80,80)->save($bipath);
		$bipaths = '/'.'upload'.'/'.$tb->getSaveName();
		if(!$btimg) {
			$this->error('图片上传失败');
		}

		$tc = $catering->validate(['ext' =>'jpg,png'])->move(ROOT_PATH.'public'.DS.'upload');
		if(!$tc) {
			$this->error($catering->getError());
		}
		$cimage = Image::open($tc);
		$cipath = 'upload'.'/'.$tc->getSaveName();
		$ctimg = $cimage->thumb(80,80)->save($cipath);
		$cipaths = '/'.'upload'.'/'.$tc->getSaveName();
		if(!$ctimg) {
			$this->error('图片上传失败');
		}
		
		$tu = new LlistModel;
		$data = [
			'name' => $dt['name'],
			'category' => $dt['category'],
			'address' => $dt['address'],
			'phone' => $dt['phone'],
			'is_new' => $dt['is_new'],
			'is_premium' => $dt['is_premium'],
			'distance' => $dt['distance'],
			'float_delivery_free' => $dt['float_delivery_free'],
			'promotion_info' => $dt['promotion_info'],
			'description' => $dt['description'],
			'float_minimum_order_amount' => $dt['float_minimum_order_amount'],
			'image_path' => $ipaths,
		];
		$tus = $tu->where('id',$id)->update($data);
		if(!$tus) {
			$this->error('服务繁忙,请稍后尝试',url('/admin/gedit','id='.$id));
		}
		//关联更新
		$tuget = LlistModel::get($id);
		$lcn = $tuget->license()->getByLlistId($id);
		 $lcn->catering_service_license_image = $cipaths;
		 $lcn->business_license_image = $bipaths;
		 $tuliecnse = $lcn->save();
		if(!$tuliecnse) {
			$this->error('更新失败');
		}
		$this->success('更新成功',url('/admin/goods'));
	}
}