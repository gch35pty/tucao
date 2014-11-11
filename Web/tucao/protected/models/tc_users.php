<?php

/**
 * This is the model class for table "tc_users".
 *
 * The followings are the available columns in table 'tc_users':
 * @property integer $USER_ID
 * @property integer $GENDER
 * @property string $NICK_NAME
 * @property string $REG_PHONE_NUM
 * @property string $REG_EMAIL
 * @property string $PASSWORD
 * @property integer $LEVEL
 * @property integer $SCORE
 * @property integer $USER_STATUS
 * @property integer $DEFAULT_PIC
 * @property string $HEAD_PIC
 */
class tc_users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PASSWORD', 'required'),
			array('GENDER, LEVEL, SCORE, USER_STATUS, DEFAULT_PIC', 'numerical', 'integerOnly'=>true),
			array('NICK_NAME, REG_PHONE_NUM, PASSWORD', 'length', 'max'=>50),
			array('REG_EMAIL, HEAD_PIC', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USER_ID, GENDER, NICK_NAME, REG_PHONE_NUM, REG_EMAIL, PASSWORD, LEVEL, SCORE, USER_STATUS, DEFAULT_PIC, HEAD_PIC', 'safe', 'on'=>'search'),
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
			'USER_ID' => 'User',
			'GENDER' => 'Gender',
			'NICK_NAME' => 'Nick Name',
			'REG_PHONE_NUM' => 'Reg Phone Num',
			'REG_EMAIL' => 'Reg Email',
			'PASSWORD' => 'Password',
			'LEVEL' => 'Level',
			'SCORE' => 'Score',
			'USER_STATUS' => 'User Status',
			'DEFAULT_PIC' => 'Default Pic',
			'HEAD_PIC' => 'Head Pic',
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

		$criteria->compare('USER_ID',$this->USER_ID);

		$criteria->compare('GENDER',$this->GENDER);

		$criteria->compare('NICK_NAME',$this->NICK_NAME,true);

		$criteria->compare('REG_PHONE_NUM',$this->REG_PHONE_NUM,true);

		$criteria->compare('REG_EMAIL',$this->REG_EMAIL,true);

		$criteria->compare('PASSWORD',$this->PASSWORD,true);

		$criteria->compare('LEVEL',$this->LEVEL);

		$criteria->compare('SCORE',$this->SCORE);

		$criteria->compare('USER_STATUS',$this->USER_STATUS);

		$criteria->compare('DEFAULT_PIC',$this->DEFAULT_PIC);

		$criteria->compare('HEAD_PIC',$this->HEAD_PIC,true);

		return new CActiveDataProvider('tc_users', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return tc_users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}