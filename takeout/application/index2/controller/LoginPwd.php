<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/5
 * Time: 16:42
 */
namespace app\index2\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\index2\model\LoginPwd as LonginPwdModel;

class LoginPwd extends Controller
{
    
    public function login_pwd(Request $request) {
        $name = $request->post('name');
        $pwd = $request->post('pwd');
       $captcha = $request->param('captcha');
       $secode = session('secode');
       $secdoeid = session_id();
       // halt($secdoeid);
       // halt($secode);
        $lt = LonginPwdModel::getByName($name);
        $capt = $this->check($captcha);
        if($capt ==0) {
            $data =[
                'code' => 1,
                'msg' => '验证码错误'
            ];
            return json($data);
        } else {
            if (LonginPwdModel::login($name, $pwd)) {
                $userid = session('userId');
                $data = [
                    "code" => 0,
                    "data" => [
                        "_id" => LonginPwdModel::encryPassword($userid),
                        "name" => $name
                    ],
                ];
                return json($data);
            } else if ($lt && LonginPwdModel::encryPassword($pwd) != $lt->getData('password')) {
                $data = [
                    "code" => 1,
                    "msg" => "用户或密码不正确"
                ];
                return json($data);
            } else if (empty($name)) {
                $data = [
                    "code" => 1,
                    "msg" => "用户为空"
                ];
                return json($data);
            } else {
                $userid = session('userId');
                $data = [
                    "code" => 0,
                    "data" => [
                        "_id" => LonginPwdModel::encryPassword($userid),
                        "name" => $name,
                    ],
                ];
                return json($data);
            }
        }
    }

    //验证码生成
    public function getcaptcha() {
         $config = [
        'codeSet' => '2345678',
        'imageH'        => 45,
        // 验证码图片高度
        'imageW'        => 150,

        'fontSize'      => 18,
        // 验证码字体大小(px)
         'length'        => 4,
        // 验证码位数
    ];
      $captcha = new \think\captcha\Captcha($config);
      return $captcha->entry();
    }
   
    // public function loginpwd() {
    //     return $this->fetch();
    // }

    public function check($code) {
        if(!captcha_check($code)) {
            return 0;
        } else {
            return 1;
        }
    }

}