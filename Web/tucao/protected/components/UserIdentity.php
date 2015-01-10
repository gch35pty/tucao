<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $_name;

    public function getId() {
        return $this->_id;
    }

    public function getName() {
        return $this->_name;
    }

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        if(preg_match("/^\\d+$/", $this->username)){
            $type = "reg_phone_num";
        } else if(strpos($this->username, "@")!==false) {
            $type = "reg_email";
        } else {
            $type = "nick_name";
        }

        $record = Users::model()->findColumnByAttributes(array("USER_ID", "NICK_NAME", "REG_EMAIL", "REG_PHONE_NUM", "HEAD_PIC", "LEVEL","SCORE","PASSWORD"),array($type=>$this->username));
        //$record = Users::model()->findbyPk("1");
        //echo $type;
        $arra = $record->attributes;
        //var_dump($record);

        if($record===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        //uncomment next line to enable encode password in database
        //else if($record->password !== PwdHelper::encode($this->password))
        else if($record->PASSWORD !== $this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
//            echo $this->_id;
            $this->_id=$record->USER_ID;
            $this->_name = $record->NICK_NAME;
            $user = Yii::app()->user;
            $userA = array();
            $userA['nick_name'] = $record->NICK_NAME;
            $userA['user_id'] = $record->USER_ID;
            $userA['head_pic'] = $record->HEAD_PIC;
            $userA['level'] = $record->LEVEL;
            $userA['score'] = $record->SCORE;
            $userA['reg_email'] = $record->REG_EMAIL;
            $userA['reg_phone_num'] = $record->REG_PHONE_NUM;

            $user->user_id = $record->USER_ID;
            $user->head_pic = $record->HEAD_PIC;
            $user->level = $record->LEVEL;
            $user->score = $record->SCORE;
            $user->reg_email = $record->REG_EMAIL;
            $user->reg_phone_num = $record->REG_PHONE_NUM;
            $this->setPersistentStates($userA);
            $this->errorCode=self::ERROR_NONE;
        }
        //return false;
        return !$this->errorCode;
	}
}