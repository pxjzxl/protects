<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/5
 * Time: 16:44
 */
namespace app\index2\model;
use think\Model;
use think\Validate;

class LoginPwd extends Model
{
    public static function login($name,$pwd) {
        $user = self::getByName($name);
        if(!is_null($user)) {
            if($user->checkpassword($pwd)) {
                session('userId',$user->id);
                return true;
            }
        } else {
            if(!empty($name)) {
                self::register($name,$pwd);
                self::login($name,$pwd);
            } else {
                return false;
            }
//            $data = [
//                'name' => $name,
//                'password' => self::encryPassword($pwd),
//            ];
//            $md = model('LoginPwd');
//            $md->save($data);
        }
    }

    public function checkpassword($pwd) {
        if($this->getData('password') === self::encryPassword($pwd)) {
            return true;
        } else {
            return false;
        }
    }

    public static function encryPassword($pwd) {
        return sha1(md5($pwd).'salt');
    }

    public static function logout() {
        session('userId',Null);
        return true;
    }

    public static function islogin() {
        $userid = session('userId');

    }

    public static function register($name,$pwd) {
        $data = [
            'name' => $name,
            'password' => self::encryPassword($pwd),
        ];
        $md = model('LoginPwd');
        $md->save($data);
    }

//    public static function check($code) {
//       // dump($code);
//        $captcha = new \think\captcha\Captcha();
////        dump($captcha);
//        if(!$captcha->check($code)) {
//            return false;
//        } else {
//           return true;
//        }
//    }

//    public static function check($code) {
//        //dump($code);
//        $captcha = new \think\captcha\Captcha();
//        $checkValue = $captcha->check($code);
//        //dump($checkValue);
//        if(!$captcha->check($code)) {
////            if(!$checkValue) {
//            return false;
//        } else {
//            return true;
//        }

//        if	(true !== new validate($code))	{
//   	  	 	return false;
//   	  	}	else	{
//   	  		return true;
//   	  	}

//        if(!captcha_check($code)){
//            return false;
//        } else {
//            return true;
//        }
//    }

//    public static function check($code) {
//        if	(true !== self::validate($code,[
//                'code|验证码'=>'require|captcha'
//            ]))	{
//           return false;
//        }	else	{
//            return true;
//        }
//    }
}