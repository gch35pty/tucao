<?php

class MessageController extends Controller
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

    public function actionList()
    {
        if(!isset($_POST['offset']) || !isset($_POST['length'])
            || !is_numeric($_POST['offset']) || !is_numeric($_POST['length'])) {
            $offset = 0;
            $length = 10;
        } else {
            $offset = $_POST['offset'];
            $length = $_POST['length'];
        }
        if($_POST['user_id'] != Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
        $m = new message();

        $rs = $m->getList($_POST['user_id'], $offset, $length);

        if($rs!= null) {
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax(null);
        }

    }

    public function actionChat()
    {
        if(!isset($_POST['offset']) || !isset($_POST['length'])
            || !is_numeric($_POST['offset']) || !is_numeric($_POST['length'])) {
            $offset = 0;
            $length = 10;
        } else {
            $offset = $_POST['offset'];
            $length = $_POST['length'];
        }
        if(!isset($_POST['login_user']) || $_POST['login_user'] != Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
        if(!isset($_POST['user_id']) || !is_numeric($_POST['user_id'])) {
            $this->sendAjax(null);
            return;
        }
        $m = new message();
        $rs = $m->getChat($_POST['login_user'], $_POST['user_id'], $offset, $length);
        if($rs!=null){
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax(null);
        }
    }

    public function actionSetread()
    {
        if(!isset($_POST['login_user']) || $_POST['login_user'] != Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
        if(!isset($_POST['user_id']) || !is_numeric($_POST['user_id'])) {
            $this->sendAjax(null);
            return;
        }
        $m = new message();
        $rs = $m->setRead($_POST['login_user'], $_POST['user_id']);
        if($rs>=0){
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax(null);
        }

    }
}
