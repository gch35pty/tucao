<?php

/**
 * This is the model class for table "tc_share".
 *
 * The followings are the available columns in table 'tc_share':
 * @property integer $SHARE_ID
 * @property string $CONTENT
 * @property integer $TUCAO_ID
 * @property integer $USER_ID
 * @property integer $SHARE_DEST
 * @property integer $SHARE_STATUS
 * @property string $CREATE_TIME
 */
class tc_share extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_share';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TUCAO_ID, USER_ID, SHARE_DEST, SHARE_STATUS', 'numerical', 'integerOnly'=>true),
			array('CONTENT', 'length', 'max'=>200),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SHARE_ID, CONTENT, TUCAO_ID, USER_ID, SHARE_DEST, SHARE_STATUS, CREATE_TIME', 'safe', 'on'=>'search'),
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
			'SHARE_ID' => 'Share',
			'CONTENT' => 'Content',
			'TUCAO_ID' => 'Tucao',
			'USER_ID' => 'User',
			'SHARE_DEST' => 'Share Dest',
			'SHARE_STATUS' => 'Share Status',
			'CREATE_TIME' => 'Create Time',
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

		$criteria->compare('SHARE_ID',$this->SHARE_ID);

		$criteria->compare('CONTENT',$this->CONTENT,true);

		$criteria->compare('TUCAO_ID',$this->TUCAO_ID);

		$criteria->compare('USER_ID',$this->USER_ID);

		$criteria->compare('SHARE_DEST',$this->SHARE_DEST);

		$criteria->compare('SHARE_STATUS',$this->SHARE_STATUS);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		return new CActiveDataProvider('tc_share', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return tc_share the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}