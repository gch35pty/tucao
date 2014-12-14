<?php

class Tucao_commentController extends Controller
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
			array('deny',  // deny all users
				'users'=>array('?'),
			),
		);
	}

    public function actionApply() {
        $tc_comm = new Tucao_comment();
        if(!isset($_POST['tucao_id']) || !isset($_POST['content']) || !isset($_POST['hide'])) {
            $this->sendAjax(null);
            return;
        }
        $tc_comm->COMMENT_CONTENT = $_POST['content'];
        if($_POST['hide'] == 1) {
            $tc_comm->COMMENT_USER = 0;
        } else {
            $tc_comm->COMMENT_USER = Yii::app()->user->id;
        }
        $tc_comm->TUCAO_ID = $_POST['tucao_id'];
        if(isset($_POST['reply_comment'])) {
            $tc_comm->REPLY_COMMENT = $_POST['reply_comment'];
        } else {
            $tc_comm->REPLY_COMMENT = 0;
        }
        if($tc_comm->validate() && $tc_comm->save(false)) {
            $this->sendAjax(array(
                'comment_id' => $tc_comm->attributes['COMMENT_ID']),
                true);
        } else {
            $this->sendAjax(null);
        }
    }
}
