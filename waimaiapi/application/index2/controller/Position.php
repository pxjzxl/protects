<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/5
 * Time: 12:23
 */
namespace app\index2\controller;

use think\Request;

class Position
{
    public function position(Request $request) {
        $ps = $request->param('geohash');
        if(!$ps) {
            $data = [
                "code" => 1,
                "message" => "请输入经纬度",
            ];
            return json($data);
        } else {
            if($ps == "40.10038,116.36867") {
                $data = [
                    "code" => 0,
	                "data" => [
                    "address" => "广东省广州市增城区",
                    "city" => "北京市",
	                "geohash" => $ps,
                    "latitude" => "40.10038",
	                "longitude" => "116.36867",
	                "name" => "广东农工商职业技术学院(393)",
                    ]
                ];
                return json($data);
            } else {
                $data = [
                    "code" => 0,
                    "data" => [
                        "address" => "111",
                        "city" => "111",
                        "geohash" => "111",
                        "latitude" => "111",
                        "longitude" => "111",
                        "name" => "1111",
                    ],
                ];
                return json($data);
            }
        }
    }
}
