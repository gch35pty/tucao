<?php

/**
 * This is the model class for table "tc_tucao_comment".
 *
 * The followings are the available columns in table 'tc_tucao_comment':
 * @property integer $COMMENT_ID
 * @property integer $TUCAO_ID
 * @property string $COMMENT_CONTENT
 * @property string $CREATE_TIME
 * @property integer $COMMENT_USER
 * @property integer $REPLY_COMMENT
 */
class tc_tucao_comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_tucao_comment';
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
			array('TUCAO_ID, COMMENT_USER, REPLY_COMMENT', 'numerical', 'integerOnly'=>true),
			array('COMMENT_CONTENT', 'length', 'max'=>200),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMMENT_ID, TUCAO_ID, COMMENT_CONTENT, CREATE_TIME, COMMENT_USER, REPLY_COMMENT', 'safe', 'on'=>'search'),
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
			'COMMENT_ID' => 'Comment',
			'TUCAO_ID' => 'Tucao',
			'COMMENT_CONTENT' => 'Comment Content',
			'CREATE_TIME' => 'Create Time',
			'COMMENT_USER' => 'Comment User',
			'REPLY_COMMENT' => 'Reply Comment',
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

		$criteria->compare('COMMENT_ID',$this->COMMENT_ID);

		$criteria->compare('TUCAO_ID',$this->TUCAO_ID);

		$criteria->compare('COMMENT_CONTENT',$this->COMMENT_CONTENT,true);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('COMMENT_USER',$this->COMMENT_USER);

		$criteria->compare('REPLY_COMMENT',$this->REPLY_COMMENT);

		return new CActiveDataProvider('tc_tucao_comment', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return tc_tucao_comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}