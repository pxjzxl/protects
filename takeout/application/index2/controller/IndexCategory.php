<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/5
 * Time: 13:38
 */
namespace app\index2\controller;
use app\index2\model\IndexCategory as PositionModel;
use think\Request;

class IndexCategory
{
    public function index_category() {
            $postt = new PositionModel();
            $post = $postt->select();
                 $data = [
                     "code" => 0,
                     "data"=> $post,
                 ];
            echo json_encode($data);
        }
}
