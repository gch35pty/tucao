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

    //返回未读的用户评论列表
    public function actionUnread_comment() {
        $notiForm = new NotificationForm();
        if(!isset($_POST['user_id']) || $_POST['user_id']!= Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
        $notiForm->user_id = $_POST['user_id'];
        if(!isset($_POST['offset']) || !isset($_POST['length'])) {
            $notiForm->offset = 0;
            $notiForm->length = 10;
        } else {
            $notiForm->offset = $_POST['offset'];
            $notiForm->length = $_POST['length'];
        }
        if(!$notiForm->validate()) {
            $this->sendAjax(null);
        }
        $rs = $notiForm->getUnreadComment();
        if($rs != null) {
            $this->sendAjax($rs,true);
        } else {
            $this->sendAjax(null);
        }

    }

    public function actionSetread()
    {
        if(!isset($_POST['comment_id']) || !is_numeric($_POST['comment_id'])) {
            $this->sendAjax(null);
            return;
        }
        $tc_comm = new Tucao_comment();
        $rs = $tc_comm->setRead($_POST['comment_id']);
        if($rs >= 0) {
            $this->sendAjax($rs);
        } else {
            $this->sendAjax(null);
        }
    }

    public function actionApply() {
        $tc_comm = new Tucao_comment();
        $tc = new Tucao();
        if(isset($_POST['user_id']) && $_POST['user_id'] != Yii::app()->user->id) {
            $this->sendAjax(null);
            return;
        }
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
        if($tc_comm->validate()) {

            $transaction = Yii::app()->db->beginTransaction(); //创建事务
            try {
                $tc_comm->save(false);
                $rs = $tc->addComment($_POST['tucao_id']);
                if($rs <=0) {
                    $this->sendAjax(null);
                    $transaction->rollback();
                    return;
                }
                $transaction->commit(); //提交事务会真正的执行数据库操作
                $rtn = true;
            } catch (Exception $e) {
                $transaction->rollback(); //如果操作失败, 数据回滚
                echo $e->getMessage();

                $this->sendAjax(array(
                'comment_id' => $tc_comm->attributes['COMMENT_ID']),
                true);
            }
            $this->sendAjax(array("comment_id"=>$tc_comm->attributes['COMMENT_ID']),true);

        } else {
            $this->sendAjax(null);
        }
    }

    public function actionSupport()
    {
        if(!UtilHelper::checkNumParam($_POST['comment_id']) || !UtilHelper::checkLoginU($_POST['user_id']))
        {
            $this->sendAjax(null);
            return null;
        }
        if(UtilHelper::checkNumParam($_POST['status'])) {
            $status = $_POST['status'];
        } else {
            $status = 1;
        }
        $tc_comment = new Tucao_comment();
        $rs = $tc_comment->support($_POST['comment_id'],$_POST['user_id'],$status);
        if($rs != null) {
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax(null);
        }
    }
}
