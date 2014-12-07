<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-12-3
 * Time: 下午10:49
 */

class RegisterForm extends CFormModel {
    public $username;   //now only support phone num
    public $password;
    public $nick_name;
    public $default_pic;
    public $gender;
    public $type;

    public function rules() {
        return array(
            array('username, nick_name, password', 'required'),
            array('password', 'length', "min"=>6),
            array('username', 'checktype'),
            array('default_pic, gender', 'numerical')
        );
    }

    public function checktype($attribute,$params) {
        if(preg_match("/^\\d+$/", $this->username)){
            $this->type = "reg_phone_num";
        } else if(strpos($this->username, "@")!==false) {
            $this->type = "reg_email";
        }
        //  echo $this->type;
    }

    public function save() {
        $user = new Users();
        //echo $this->type;
        if($this->type=="reg_phone_num") {
            $user->REG_PHONE_NUM = $this->username;
        } else if($this->type=="reg_email"){
            $user->REG_EMAIL = $this->username;
        } else {
//            echo '01';
            return false;
        }
        $record = Users::model()->findIdByAttributes(array($this->type=>$this->username,
            'nick_name'=>$this->nick_name), "OR");
        if($record != null) {
            //phone num and nick name can not duplicate
            return null;
        }
        $user->NICK_NAME = $this->nick_name;
        $user->PASSWORD = PwdHelper::encode($this->password);
        $user->GENDER = (int)($this->gender);
        $user->DEFAULT_PIC = (int)($this->default_pic);
        $transaction = Yii::app()->db->beginTransaction(); //创建事务
        try {
            $user->save(false);
            $transaction->commit(); //提交事务会真正的执行数据库操作
            $rtn = true;
        } catch (Exception $e) {
            $transaction->rollback(); //如果操作失败, 数据回滚
            echo $e->getMessage();
            $rtn = false;
        }
        return $rtn;
    }

}