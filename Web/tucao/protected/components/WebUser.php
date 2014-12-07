<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-11-28
 * Time: 下午11:27
 */

class WebUser extends CWebUser{
    public $head_pic;
    public $level;
    public $reg_email;
    public $reg_phone_num;

    public function isAdmin() {
        return $this->getState("isAdmin", false);
    }

}