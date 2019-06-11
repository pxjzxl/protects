<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/10
 * Time: 10:52
 */

namespace app\index2\model;
use think\Model;

class Llist extends Model
{
    public function supports () {
        return $this->hasMany('Supports');
    }

    public function licence() {
        return $this->hasOne('License');
    }

    public function activites() {
        return $this->hasone('Activites');
    }

    public function unknow() {
        return $this->hasOne('Unknow');
    }

    public function DeliveryMode() {
        return $this->hasOne('DeliveryMode');
    }

    public function goods() {
        return $this->hasMany('Goods');
    }
}