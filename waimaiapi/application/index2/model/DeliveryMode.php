<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/20
 * Time: 19:03
 */

namespace app\index2\model;

use think\Model;
class DeliveryMode extends Model
{
    public function llist() {
        return $this->belongsTo('Llist');
    }
}