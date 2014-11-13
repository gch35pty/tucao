<?php

/**
 * This is the model class for table "tc_users_relation".
 *
 * The followings are the available columns in table 'tc_users_relation':
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $ATTENTION_USER_ID
 * @property string $CREATE_TIME
 * @property integer $ATTENTION_STATUS
 */
class tc_users_relation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_users_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USER_ID, ATTENTION_USER_ID', 'required'),
			array('USER_ID, ATTENTION_USER_ID, ATTENTION_STATUS', 'numerical', 'integerOnly'=>true),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, USER_ID, ATTENTION_USER_ID, CREATE_TIME, ATTENTION_STATUS', 'safe', 'on'=>'search'),
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
			'ID' => 'Id',
			'USER_ID' => 'User',
			'ATTENTION_USER_ID' => 'Attention User',
			'CREATE_TIME' => 'Create Time',
			'ATTENTION_STATUS' => 'Attention Status',
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

		$criteria->compare('ID',$this->ID);

		$criteria->compare('USER_ID',$this->USER_ID);

		$criteria->compare('ATTENTION_USER_ID',$this->ATTENTION_USER_ID);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('ATTENTION_STATUS',$this->ATTENTION_STATUS);

		return new CActiveDataProvider('tc_users_relation', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return tc_users_relation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}