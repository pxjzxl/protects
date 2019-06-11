<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/5
 * Time: 14:55
 */
namespace app\index2\controller;

use think\Request;
use app\index2\model\Shops as ShopsModel;

class Shops
{
    public function shops(Request $request) {
        $latitude = 40.10038;
        $longitude= 116.36867;
        $lt = $request->get('latitude');
        $lg = $request->get('longitude');
        if($lt == $latitude && $lg == $longitude) {
            $userr = new ShopsModel;
            $user = $userr->select();
            $data = [
                "code" => 0,
                "data" => $user
            ];
            return json_encode($data);
        } else {
            $data = [
                "code" => 1,
                "message" => "参数错误",
            ];
            return json($data);
        }
    }
}