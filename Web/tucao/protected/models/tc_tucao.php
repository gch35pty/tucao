<?php

/**
 * This is the model class for table "tc_tucao".
 *
 * The followings are the available columns in table 'tc_tucao':
 * @property integer $TC_TUCAO
 * @property string $TITLE
 * @property string $CONTENT
 * @property integer $HAS_PIC
 * @property integer $SOURCE
 * @property integer $FATHER_ID
 * @property integer $TOPIC_ID
 * @property integer $COMMENT_NUM
 * @property integer $SUPPORT_NUM
 * @property integer $SHARE_NUM
 * @property string $CREATE_TIME
 * @property integer $IS_ANONYMOUS
 * @property integer $USER_ID
 * @property string $LADTITUDE
 * @property string $LONGITUDE
 * @property string $CITY
 * @property string $POSITION_DESC
 * @property integer $TUCAO_STATUS
 */
class tc_tucao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_tucao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TITLE, CONTENT', 'required'),
			array('HAS_PIC, SOURCE, FATHER_ID, TOPIC_ID, COMMENT_NUM, SUPPORT_NUM, SHARE_NUM, IS_ANONYMOUS, USER_ID, TUCAO_STATUS', 'numerical', 'integerOnly'=>true),
			array('TITLE, POSITION_DESC', 'length', 'max'=>100),
			array('LADTITUDE, LONGITUDE', 'length', 'max'=>10),
			array('CITY', 'length', 'max'=>50),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TC_TUCAO, TITLE, CONTENT, HAS_PIC, SOURCE, FATHER_ID, TOPIC_ID, COMMENT_NUM, SUPPORT_NUM, SHARE_NUM, CREATE_TIME, IS_ANONYMOUS, USER_ID, LADTITUDE, LONGITUDE, CITY, POSITION_DESC, TUCAO_STATUS', 'safe', 'on'=>'search'),
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
			'TC_TUCAO' => 'Tc Tucao',
			'TITLE' => 'Title',
			'CONTENT' => 'Content',
			'HAS_PIC' => 'Has Pic',
			'SOURCE' => 'Source',
			'FATHER_ID' => 'Father',
			'TOPIC_ID' => 'Topic',
			'COMMENT_NUM' => 'Comment Num',
			'SUPPORT_NUM' => 'Support Num',
			'SHARE_NUM' => 'Share Num',
			'CREATE_TIME' => 'Create Time',
			'IS_ANONYMOUS' => 'Is Anonymous',
			'USER_ID' => 'User',
			'LADTITUDE' => 'Ladtitude',
			'LONGITUDE' => 'Longitude',
			'CITY' => 'City',
			'POSITION_DESC' => 'Position Desc',
			'TUCAO_STATUS' => 'Tucao Status',
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

		$criteria->compare('TC_TUCAO',$this->TC_TUCAO);

		$criteria->compare('TITLE',$this->TITLE,true);

		$criteria->compare('CONTENT',$this->CONTENT,true);

		$criteria->compare('HAS_PIC',$this->HAS_PIC);

		$criteria->compare('SOURCE',$this->SOURCE);

		$criteria->compare('FATHER_ID',$this->FATHER_ID);

		$criteria->compare('TOPIC_ID',$this->TOPIC_ID);

		$criteria->compare('COMMENT_NUM',$this->COMMENT_NUM);

		$criteria->compare('SUPPORT_NUM',$this->SUPPORT_NUM);

		$criteria->compare('SHARE_NUM',$this->SHARE_NUM);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('IS_ANONYMOUS',$this->IS_ANONYMOUS);

		$criteria->compare('USER_ID',$this->USER_ID);

		$criteria->compare('LADTITUDE',$this->LADTITUDE,true);

		$criteria->compare('LONGITUDE',$this->LONGITUDE,true);

		$criteria->compare('CITY',$this->CITY,true);

		$criteria->compare('POSITION_DESC',$this->POSITION_DESC,true);

		$criteria->compare('TUCAO_STATUS',$this->TUCAO_STATUS);

		return new CActiveDataProvider('tc_tucao', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return tc_tucao the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}