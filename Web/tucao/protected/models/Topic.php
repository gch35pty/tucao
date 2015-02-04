<?php

/**
 * This is the model class for table "Topic".
 *
 * The followings are the available columns in table 'Topic':
 * @property integer $TOPIC_ID
 * @property string $TOPIC_TITLE
 * @property string $TOPIC_CONTENT
 * @property string $CREATE_TIME
 * @property string $END_TIME
 * @property integer $HAS_PIC
 * @property integer $CREATE_USER
 * @property string $LADTITUDE
 * @property string $LONGITUDE
 * @property string $CITY
 * @property string $POSITION_DESC
 * @property integer $IS_ANONYMOUS
 * @property integer $DISTANCE
 * @property integer $TUCAO_NUM
 */
class Topic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HAS_PIC, CREATE_USER, IS_ANONYMOUS,DISTANCE, TUCAO_NUM', 'numerical', 'integerOnly'=>true),
			array('TOPIC_TITLE, POSITION_DESC', 'length', 'max'=>100),
			array('LADTITUDE, LONGITUDE', 'length', 'max'=>10),
			array('CITY', 'length', 'max'=>50),
			array('TOPIC_CONTENT, CREATE_TIME, END_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TOPIC_ID, TOPIC_TITLE, TOPIC_CONTENT, CREATE_TIME, END_TIME, HAS_PIC,IS_ANONYMOUS, DISTANCE, TUCAO_NUM, CREATE_USER, LADTITUDE, LONGITUDE, CITY, POSITION_DESC', 'safe', 'on'=>'search'),
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
			'TOPIC_ID' => 'Topic',
			'TOPIC_TITLE' => 'Topic Title',
			'TOPIC_CONTENT' => 'Topic Content',
			'CREATE_TIME' => 'Create Time',
			'END_TIME' => 'End Time',
			'HAS_PIC' => 'Has Pic',
			'CREATE_USER' => 'Create User',
			'LADTITUDE' => 'Ladtitude',
			'LONGITUDE' => 'Longitude',
			'CITY' => 'City',
			'POSITION_DESC' => 'Position Desc',
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

		$criteria->compare('TOPIC_ID',$this->TOPIC_ID);

		$criteria->compare('TOPIC_TITLE',$this->TOPIC_TITLE,true);

		$criteria->compare('TOPIC_CONTENT',$this->TOPIC_CONTENT,true);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('END_TIME',$this->END_TIME,true);

		$criteria->compare('HAS_PIC',$this->HAS_PIC);

		$criteria->compare('CREATE_USER',$this->CREATE_USER);

		$criteria->compare('LADTITUDE',$this->LADTITUDE,true);

		$criteria->compare('LONGITUDE',$this->LONGITUDE,true);

		$criteria->compare('CITY',$this->CITY,true);

		$criteria->compare('POSITION_DESC',$this->POSITION_DESC,true);

		return new CActiveDataProvider('Topic', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Topic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function get($id) {
        if($id == null) {
            return null;
        }
        $sql = "select
            TOPIC_ID as topic_id,
            TOPIC_TITLE as title,
            TOPIC_CONTENT as content,
            TUCAO_NUM as tucao_num,
            topic.CREATE_TIME as create_time,
            LADTITUDE as lat,
            LONGITUDE as lng,
            users.NICK_NAME as user_name,
            users.USER_ID as user_id,
            users.LEVEL as level
            from topic,users where topic_id = {$id} and users.user_id = topic.CREATE_USER";
        $rs = Yii::app()->db->createCommand($sql)->queryAll();
        return $rs;
    }

    //add tucao_num while new tucao from the topic created
    public function addTucao($id) {

        if(is_null($id)) {
            return null;
        }
        $rs = $this->updateCounters(array('TUCAO_NUM'=>1),"TOPIC_ID={$id}");
        return $rs;
    }
}