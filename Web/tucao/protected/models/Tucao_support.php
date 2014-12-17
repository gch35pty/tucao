<?php

/**
 * This is the model class for table "Tucao_support".
 *
 * The followings are the available columns in table 'Tucao_support':
 * @property integer $SUPPORT_ID
 * @property integer $TUCAO_ID
 * @property integer $SUPPORT_STATUS
 * @property integer $USER_ID
 * @property string $CREATE_TIME
 * @property integer $STATUS
 */
class Tucao_support extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Tucao_support';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TUCAO_ID', 'required'),
			array('TUCAO_ID, SUPPORT_STATUS, USER_ID, STATUS', 'numerical', 'integerOnly'=>true),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SUPPORT_ID, TUCAO_ID, SUPPORT_STATUS, USER_ID, CREATE_TIME, STATUS', 'safe', 'on'=>'search'),
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
			'SUPPORT_ID' => 'Support',
			'TUCAO_ID' => 'Tucao',
			'SUPPORT_STATUS' => 'Support Status',
			'USER_ID' => 'User',
			'CREATE_TIME' => 'Create Time',
            'STATUS' => 'Status',
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

		$criteria->compare('SUPPORT_ID',$this->SUPPORT_ID);

		$criteria->compare('TUCAO_ID',$this->TUCAO_ID);

		$criteria->compare('SUPPORT_STATUS',$this->SUPPORT_STATUS);

		$criteria->compare('USER_ID',$this->USER_ID);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

        $criteria->compare('STATUS', $this->STATUS);

		return new CActiveDataProvider('Tucao_support', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Tucao_support the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}