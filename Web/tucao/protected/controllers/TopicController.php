<?php

class TopicController extends Controller
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

    public function actionDetail() {
        $topic = new Topic();
        $tc = new Tucao();
        if(isset($_POST['topic_id']))
            $topic_id = $_POST["topic_id"];
        else{
            $this->sendAjax("invalid params", false);
            return;
        }
        $data = $topic->get($topic_id);
        if($data == null) {
            $this->sendAjax("no topic find",false);
        } else {
            $tucaos = $tc->getByTopic($topic_id,0,10);
            $data[0]['tucao'] = $tucaos;
            $this->sendAjax($data, true);
        }
    }

    public function actionApply() {
        $topic = new Topic();
//        //user can only send topic by himself
        if($_POST['user_id'] != Yii::app()->user->id) {
            $this->sendAjax(null);
        }
        if(!isset($_POST['user_id']) || !isset($_POST['content']) ||
            !isset($_POST['hide']) || !isset($_POST['lat']) || !isset($_POST['lng']))
        {
            $this->sendAjax(null);
        }
        $topic->CREATE_USER = $_POST['user_id'];
        if(isset($_POST['title'])) {
            $topic->TOPIC_TITLE = $_POST['title'];
        }
        $topic->TOPIC_CONTENT = $_POST['content'];
        $topic->IS_ANONYMOUS = $_POST['hide'];
        $topic->LADTITUDE = $_POST['lat'];
        $topic->LONGITUDE = $_POST['lng'];
        if(isset($_POST['distance']))
            $topic->DISTANCE = $_POST['distance'];
        else
            $topic->DISTANCE = 0;
        //事务包含了存储topic，  任务
        $transaction = Yii::app()->db->beginTransaction(); //创建事务
        try {
            if($topic->validate() && $topic->save(false)) {
                $transaction->commit(); //提交事务会真正的执行数据库操作
                //print_r($tc->attributes);
                $this->sendAjax(array(
                        'topic_id'=>$topic->attributes['TOPIC_ID']),
                    true);
            } else {
                $transaction->rollback();
                $this->sendAjax("topic save fail",false);
                return;
            }
        } catch (Exception $e) {
            $transaction->rollback(); //如果操作失败, 数据回滚
            echo "error:".$e->getMessage();
            $this->sendAjax("db fail",false);
        }

    }

    //search the hot topic nearby with page
    public function actionNearhot() {
        $m = new TopicNearForm();
        $m->attributes = $_POST;
        if(!$m->validate()) {
            $this->sendAjax("invalid params",false);
        }
        $rs =  $m->searchHot();
        if($rs!= null) {
            $this->sendAjax($rs, true);
        } else {
            $this->sendAjax("no data", true);
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
			array('deny',  // deny not login users
				'users'=>array('?'),
			),
		);
	}

}
