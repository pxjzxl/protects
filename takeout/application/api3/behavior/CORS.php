<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/4/15
 * Time: 12:30
 */
namespace app\api3\behavior;

use think\Response;

class CORS
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if (request()->isOptions()) {
            exit();
        }
    }
}