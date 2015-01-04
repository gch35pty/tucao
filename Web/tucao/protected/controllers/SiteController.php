<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        if(!isset($_POST['username']) || !isset($_POST['password'])) {
            $this->sendAjax(null);
        }
        $password = PwdHelper::encode($_POST['password']);
		$model=new LoginForm;
        $model->attributes = array('username'=>$_POST['username'], 'password'=>$password);

        if($model->validate() && $model->login()) {
            $user = Yii::app()->user;

            $this->sendAjax(array(
                'email'=>$user->reg_email,
                'phone'=>$user->reg_phone_num,
                'user_id'=>$user->id,
                'nick_name'=>$user->name,
                'head_pic'=>$user->head_pic,
                'level'=>$user->level,
                'sid'=>session_id(),
            ), true);
        } else {
            $this->sendAjax(null);
        }

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionRegister() {
        $model = new RegisterForm();
        // echo "hello";
        $model->attributes = array('username'=>$_POST['username'], 'password'=>$_POST['password'],
                      'nick_name' => $_POST['nick_name'],'default_pic'=>$_POST['default_pic'],'gender'=>$_POST['gender']);
        //print_r($model->attributes);
        $rtn = false;
        // echo $model->validate();
        // return;
        if($model->validate() && $model->save(false)) {
            $rtn = true;
        }
        $this->sendAjax($rtn, true);
    }

    public function actionCheckNickName() {
        if(!isset($_POST['nick_name'])) {
            $this->sendAjax(null);
        }
        $users = new Users();
        $rs = $users->checkNickName($_POST['nick_name']);
        //print_r($rs);
        if($rs!= null && 0 == $rs) {
            $this->sendAjax(true,true);
        } else {
            $this->sendAjax(null);
        }
    }

    public function actionCheckUserName() {
        if(!isset($_POST['user_name'])) {
            $this->sendAjax(null);
            return;
        }
        $users = new Users();
        $rs = $users->checkUserName($_POST['user_name']);
        if(0 === $rs) {
            $this->sendAjax(true,true);
        } else {
            $this->sendAjax(null);
        }
    }
}


