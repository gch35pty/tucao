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

    public function actionDetail() {
        $tc = new Tucao();
        $tc_comm = new Tucao_comment();
        if(isset($_POST['tucao_id']))
            $tc_id = $_POST["tucao_id"];
        else{
            $this->sendAjax(null);
            return;
        }
        $data = $tc->get($tc_id);
        if($data == null) {
            $this->sendAjax(null);
        } else {
            $comments = $tc_comm->getByTc($tc_id,0,10);
            $data[0]['comment'] = $comments;
            $this->sendAjax($data, true);
        }
    }

    public function actionComment() {
        $tc_comm = new Tucao_comment();
        if(isset($_POST['tucao_id']))
            $tc_id = $_POST["tucao_id"];
        else {
            $this->sendAjax(null);
            return;
        }
        if(isset($_POST['offset']) && isset($_POST['length'])) {
            $offset = $_POST['offset'];
            $length = $_POST['length'];
        } else {
            $offset = 0;
            $length = 10;
        }
        $comments = $tc_comm->getByTc($tc_id,$offset,$length);
        if($comments == null)
            $this->sendAjax(null);
        else
            $this->sendAjax($comments,true);
    }

    public function actionApply() {
        $tc = new Tucao();
//        //user can only send tucao by himself
        if($_POST['user_id'] != Yii::app()->user->id) {
            $this->sendAjax(null);
        }
        if(!isset($_POST['user_id']) || !isset($_POST['content']) ||
            !isset($_POST['hide']) || !isset($_POST['lat']) || !isset($_POST['lng']))
        {
            $this->sendAjax(null);
        }
        $tc->USER_ID = $_POST['user_id'];
        if(isset($_POST['title'])) {
            $tc->TITLE = $_POST['title'];
        }
        $tc->CONTENT = $_POST['content'];
        $tc->IS_ANONYMOUS = $_POST['hide'];
        $tc->LADTITUDE = $_POST['lat'];
        $tc->LONGITUDE = $_POST['lng'];
        if(isset($_POST['distance']))
            $tc->DISTANCE = $_POST['distance'];
        else
            $tc->DISTANCE = 0;
        if(isset($_POST['topic_id']))
            $tc->TOPIC_ID = $_POST['topic_id'];
        if(isset($_POST['father_id']))
            $tc->FATHER_ID = $_POST['father_id'];
        $user = new Users();
        //事务包含了存储tucao，给用户加分两个任务
        $transaction = Yii::app()->db->beginTransaction(); //创建事务
        try {
            $user->addScoreByApply($_POST['user_id']);
            if($tc->validate() && $tc->save(false)) {
                $transaction->commit(); //提交事务会真正的执行数据库操作
                //print_r($tc->attributes);
                $this->sendAjax(array(
                        'tucao_id'=>$tc->attributes['TUCAO_ID']),
                    true);
            } else {
                $transaction->rollback();
                $this->sendAjax("tucao save fail",false);
                return;
            }
        } catch (Exception $e) {
            $transaction->rollback(); //如果操作失败, 数据回滚
            echo "error:".$e->getMessage();
            $this->sendAjax("db fail",false);
        }

    }

    //search the new tc nearby with page
    public function actionNearnew() {
        $m = new TucaoNearForm();
        $m->attributes = $_POST;
        if(!$m->validate()) {
            $this->sendAjax(null);
        }
        $rs = $m->searchNew();
        if($rs!= null) {
            $this->sendAjax($rs,true);
        } else {
            $this->sendAjax("no data",true);
        }
    }

    //search the hot tc nearby with page
    public function actionNearhot() {
        $m = new TucaoNearForm();
        $m->attributes = $_POST;
        if(!$m->validate()) {
            $this->sendAjax(null);
        }
        $rs =  $m->searchHot();
        if($rs!= null) {
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax("no data", true);
        }
    }

    public function actionHot() {
        if(!isset($_POST['offset']) || !isset($_POST['length'])
                || !is_numeric($_POST['offset']) || !is_numeric($_POST['length'])) {
            $offset = 0;
            $length = 10;
        } else {
            $offset = $_POST['offset'];
            $length = $_POST['length'];
        }
        $tc = new Tucao();
        $rs = $tc->getHot($offset,$length);
        if($rs != null) {
            $this->sendAjax($rs,true);
        } else {
            $this->sendAjax("no data", true);
        }

    }

    public function actionSupport()
    {
        if(!isset($_POST['tucao_id']) ||!UtilHelper::checkNumParam($_POST['tucao_id']) ||
            !isset($_POST['user_id']) || !UtilHelper::checkLoginU($_POST['user_id'])) {
            $this->sendAjax(null);
            return;
        }
        if(isset($_POST['status']) && UtilHelper::checkNumParam($_POST['status'])) {
            $status = $_POST['status'];
        } else {
            $status = 1;
        }
        $tc = new Tucao();
        $rs = $tc->support($_POST['tucao_id'],$_POST['user_id'],$status);
        print_r($rs);
        if($rs === true) {
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax($rs, false);
        }
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
