<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-11-27
 * Time: 上午8:08
 */

class TestController extends Controller {
    public $t_aa;

    function actionIndex() {
        $pwd = PwdHelper::encode("123456");
        $r = User::model()->findByAttributes(array("email"=>"xiaoge@kk.com"));
        echo $r->password."    ".$pwd;
        $r->password = $pwd;
        echo $r->save();
    }

    function actionDo() {
//        echo CJSON::encode($_GET);
        $this->render("do");
    }
    function actionInfo() {
        phpinfo();
    }
    function actionAvatar() {
        $this->render("avatar");
    }
}