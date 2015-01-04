<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $MESSAGE_ID
 * @property string $CONTENT
 * @property string $CREATE_TIME
 * @property integer $SEND_USER
 * @property integer $RECEIVE_USER
 * @property integer $MESSAGE_STATUS
 */
class message extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MESSAGE_ID', 'required'),
			array('MESSAGE_ID, SEND_USER, RECEIVE_USER, MESSAGE_STATUS', 'numerical', 'integerOnly'=>true),
			array('CONTENT', 'length', 'max'=>200),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MESSAGE_ID, CONTENT, CREATE_TIME, SEND_USER, RECEIVE_USER, MESSAGE_STATUS', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'MESSAGE_ID' => 'Message',
			'CONTENT' => 'Content',
			'CREATE_TIME' => 'Create Time',
			'SEND_USER' => 'Send User',
			'RECEIVE_USER' => 'Receive User',
			'MESSAGE_STATUS' => 'Message Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('MESSAGE_ID',$this->MESSAGE_ID);

		$criteria->compare('CONTENT',$this->CONTENT,true);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('SEND_USER',$this->SEND_USER);

		$criteria->compare('RECEIVE_USER',$this->RECEIVE_USER);

		$criteria->compare('MESSAGE_STATUS',$this->MESSAGE_STATUS);

		return new CActiveDataProvider('message', array(
			'criteria'=>$criteria,
		));
	}

    public function getList($user_id, $offset, $length)
    {
        //这个sql得到message表中某个用户自己的消息列表，每个发送用户保留最新的一条，用户列表先是未读，后是已读

        $sql = "select u.user_id, u.NICK_NAME, a.CONTENT, a.CREATE_TIME, a.MESSAGE_STATUS
                from message a, users u where a.CREATE_TIME >=
	                (select CREATE_TIME from message b
	                      where a.SEND_USER = b.SEND_USER order by b.CREATE_TIME desc limit 1)
                AND RECEIVE_USER = $user_id  AND a.SEND_USER = u.USER_ID order by MESSAGE_STATUS
                limit $offset, $length;";
        $rs = Yii::app()->db->createCommand($sql)->queryAll();

        return $rs;
    }

    public function getChat($login_user, $user_id, $offset, $length)
    {
        //这个sql得打login用户与某个user_id用户的聊天记录，按时间顺序排列。
        $sql = "";

        $criteria = new CDbCriteria();
        //$criteria->select = '*';
        $criteria->addInCondition("SEND_USER", array($login_user, $user_id));
        $criteria->addInCondition("RECEIVE_USER", array($login_user, $user_id), 'AND');
        $criteria->offset = $offset;
        $criteria->limit = $length;
        $criteria->order = 'CREATE_TIME desc';
        $rs = message::model()->findAll($criteria);
        //$rs =  new CActiveDataProvider($this, array('criteria'=>$criteria));
        //print_r($rs);
        return $rs;
    }

    public function setRead($login_user, $user_id)
    {
        $rs = $this->updateAll(array('MESSAGE_STATUS'=>1),"SEND_USER=$user_id && RECEIVE_USER=$login_user");
        //print_r($rs);
        return $rs;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @return message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}


