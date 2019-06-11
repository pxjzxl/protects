<?php 
namespace app\index2\model;
use think\Model;

class Index extends Model {

	public static function check($code='') {
    	$captcha = new \think\captcha\Captcha();
    	if(!$captcha->check($code)) {
    		return false;
    	} else {
    		return true;
    	}
    }
}