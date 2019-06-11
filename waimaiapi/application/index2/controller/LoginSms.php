<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/6
 * Time: 16:57
 */

namespace app\index2\controller;
use think\Controller;
use think\Request;
use think\Session;

class LoginSms extends Controller
{
    public function login_sms(Request $request) {
        $phone = $request->post('phone');
        $cd = $request->post('code');
            $tc = session('Code');
            if($tc['limit']+$tc['time']<time()) {
                $data = [
                    'code' => 1,
                    'msg' => "验证码过期"
                ];
                return json($data);
            } else {
                if($tc['phone'] == $phone && $tc['code'] == $cd) {
                    $user = new \app\index2\model\LoginPwd;
                    $dd = [
                        'phone' => $phone,
                        'password' => $user::encryPassword(rand(1000,999))
                    ];
                    if($p =$user->getByPhone($phone)) {
                         session('userId',$p->id);
                        $pid = session('userId');
                        $data =[
                            'code' => 0,
                            'data' => [
                                '_id' => $user::encryPassword($pid),
                                'phone' => $phone
                            ],
                        ];
                        return json($data);
                    } else {
                        $user->allowField(true)->save($dd);
                        session('userId',$user->id);
                        $pid = session('userId');
                        $data =[
                            'code' => 0,
                            'data' => [
                                '_id' => $user::encryPassword($pid),
                                'phone' => $phone
                            ],
                        ];
                        return json($data);
                    }
                } else {
                    $data = [
                        'code' => 1,
                        'msg' => '手机号或验证码不正确'
                    ];
                    return json($data);
                }
            }

    }

    public function sendcode(Request $request) {
        $phone = $request->param('phone');
        import('SendTemplateSMS',EXTEND_PATH);
        $code = rand(100000,999999);
        $te = sendTemplateSMS($phone,array($code,'3'),"1");
            if($te) {
                $dt = [
                'phone' => $phone,
                'limit' => 180,
                'time' => time(),
                'code' => $code
            ];
        session('Code',$dt);
        $data = [
            'code' => 0,
        ];
        return json($data);
            } else {
                $data = [
                    'code' => 1,
                    'msg' => '短信发送失败'
                ];
                return json($data);
            }
        }

    public function logout() {
        if(\app\index2\model\LoginPwd::logout()) {
            $data = [
                'code' => 0
            ];
            return json($data);
        }

    }
}