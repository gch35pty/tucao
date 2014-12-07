<?php

class TucaoController extends Controller
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


    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function actionGetTc() {
        $tc = new Tucao();
        $tc_id = $_POST["tucao_id"];
        $data = $tc->get($tc_id);
        if($data == null) {
            $this->sendAjax(null);
        } else {
            $this->sendAjax($data, true);
        }
    }

    public function actionApply() {
        $tc = new Tucao();
//        //user can only send tucao by himself
        if($_POST['user_id'] != Yii::app()->user->id) {
            $this->sendAjax(null);
        }
        if(!isset($_POST['user_id']) || !isset($_POST['content']) ||!isset($_POST['title']) ||
            !isset($_POST['hide']) || !isset($_POST['lat']) || !isset($_POST['lng']))
        {
            $this->sendAjax(null);
        }
        $tc->USER_ID = $_POST['user_id'];
        $tc->TITLE = $_POST['title'];
        $tc->CONTENT = $_POST['content'];
        $tc->IS_ANONYMOUS = $_POST['hide'];
        $tc->LADTITUDE = $_POST['lat'];
        $tc->LONGITUDE = $_POST['lng'];
        if(!isset($_POST['distance']))
            $tc->DISTANCE = $_POST['distance'];
        if(!isset($_POST['topic_id']))
            $tc->TOPIC_ID = $_POST['topic_id'];
        if(!isset($_POST['father_id']))
            $tc->FATHER_ID = $_POST['father_id'];
        if($tc->validate() && $tc->save(false)) {
            $this->sendAjax(true, true);
        } else {
            $this->sendAjax(null);
        }

    }

    public function actionNearnew() {

    }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('deny',  // deny all users
				'users'=>array('?'),
			),
		);
	}



}
