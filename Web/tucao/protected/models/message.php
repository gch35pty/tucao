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

	/**
	 * Returns the static model of the specified AR class.
	 * @return message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}