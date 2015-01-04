<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('deny',  // deny no login users
				'users'=>array('?'),
			),
		);
	}

    public function actionInfo()
    {
        if(!isset($_POST['user_id']) || $_POST['user_id']!=Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
        $user = new Users();
//        $columns = array('user_id','gender','nick_name','reg_phone_num','reg_email','level','score','user_status',
//                            'default_pic','head_pic','create_time');
        $rs = $user->findByPk($_POST['user_id']);
        if($rs!= null) {
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax(null);
        }
    }

    public function actionUpdate()
    {
        print_r(PwdHelper::encode("123456"));
        if(!isset($_POST['user_id']) || $_POST['user_id'] != Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
        $user_id = $_POST['user_id'];
        $updateItems = array();
        if(isset($_POST['nick_name'])) {
            $record = Users::model()->findIdByAttributes(array('nick_name'=>$_POST['nick_name']), "OR");
            if($record != null) {
                $this->sendAjax(null);
                return;
            }
            $updateItems['NICK_NAME'] = $_POST['nick_name'];
        }
        if(isset($_POST['gender']) && ($_POST['gender'] == 0 || $_POST['gender'] == 1)) {
            $updateItems['GENDER'] = $_POST['gender'];
        }
        //print_r($updateItems);
        $rs = Users::model()->updateAll($updateItems,"USER_ID = $user_id");
        if($rs > 0) {
            $this->sendAjax($rs,true);
        } else {
            $this->sendAjax(false);
        }
    }

    public function actionPassword() {
        if(!isset($_POST['user_id']) || $_POST['user_id'] != Yii::app()->user->id ||
            !isset($_POST['old_password']) || !isset($_POST['new_password'])) {
            $this->sendAjax(null);
            return;
        }
        $user_id = $_POST['user_id'];
        $old_password = PwdHelper::encode($_POST['old_password']);
        $new_password = PwdHelper::encode($_POST['new_password']);
        $record = Users::model()->findIdByAttributes(array('user_id'=>$_POST['user_id'],
                                                            'password'=>$old_password), "AND");
        if($record == null) {
            $this->sendAjax(null);
        }
        $rs = Users::model()->updateAll(array('PASSWORD'=>$new_password), "USER_ID = $user_id");
        if($rs > 0) {
            $this->sendAjax($rs,true);
        } else {
            $this->sendAjax(false);
        }
    }
}
