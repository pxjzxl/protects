<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/6
 * Time: 19:21
 */
namespace  app\index2\controller;
use think\Controller;
use think\Request;

class UserInfo extends Controller
{
    public function userinfo() {
        if($uidd = session('userId')) {
            $dt = \app\index2\model\LoginPwd::where('id',$uidd)
            ->find();
            if(!$dt['name']) {
                $data = [
                    'code' => 0,
                    'data' => [
                        "_id" => \app\index2\model\LoginPwd::encryPassword($uidd),
                        "phone" => $dt['phone'],
                    ],
                ];
                return json($data);
            } else {
                $data = [
                    'code' => 0,
                    'data' => [
                        "_id" => \app\index2\model\LoginPwd::encryPassword($uidd),
                        "name" => $dt['name'],
                    ],
                ];
                return json($data);
            }

        } else {
            $data = [
                'code' => 1,
                'msg' => "请先登录"
            ];
            return json($data);
        }
    }
}