<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/10
 * Time: 10:51
 */

namespace app\index2\model;
use think\Model;

class Activites extends Model
{
    public function llist() {
        return $this->belongsTo('Llist');
    }
}