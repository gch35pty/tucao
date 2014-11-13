<?php

/**
 * This is the model class for table "tc_tucao_pic".
 *
 * The followings are the available columns in table 'tc_tucao_pic':
 * @property integer $PIC_ID
 * @property string $PIC_SRC
 * @property string $SMALL_PIC_SRC
 * @property integer $TUCAO_ID
 * @property integer $USER_ID
 * @property string $CREATE_TIME
 * @property integer $LENGTH
 * @property integer $WIDTH
 */
class tc_tucao_pic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_tucao_pic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TUCAO_ID, USER_ID, LENGTH, WIDTH', 'numerical', 'integerOnly'=>true),
			array('PIC_SRC, SMALL_PIC_SRC', 'length', 'max'=>100),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PIC_ID, PIC_SRC, SMALL_PIC_SRC, TUCAO_ID, USER_ID, CREATE_TIME, LENGTH, WIDTH', 'safe', 'on'=>'search'),
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
			'PIC_ID' => 'Pic',
			'PIC_SRC' => 'Pic Src',
			'SMALL_PIC_SRC' => 'Small Pic Src',
			'TUCAO_ID' => 'Tucao',
			'USER_ID' => 'User',
			'CREATE_TIME' => 'Create Time',
			'LENGTH' => 'Length',
			'WIDTH' => 'Width',
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

		$criteria->compare('PIC_ID',$this->PIC_ID);

		$criteria->compare('PIC_SRC',$this->PIC_SRC,true);

		$criteria->compare('SMALL_PIC_SRC',$this->SMALL_PIC_SRC,true);

		$criteria->compare('TUCAO_ID',$this->TUCAO_ID);

		$criteria->compare('USER_ID',$this->USER_ID);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('LENGTH',$this->LENGTH);

		$criteria->compare('WIDTH',$this->WIDTH);

		return new CActiveDataProvider('tc_tucao_pic', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return tc_tucao_pic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}