<?php

/**
 * This is the model class for table "Tucao_comment".
 *
 * The followings are the available columns in table 'Tucao_comment':
 * @property integer $COMMENT_ID
 * @property integer $TUCAO_ID
 * @property string $COMMENT_CONTENT
 * @property string $CREATE_TIME
 * @property integer $COMMENT_USER
 * @property integer $REPLY_COMMENT
 * @property integer $STATUS
 */
class Tucao_comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Tucao_comment';
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
			array('TUCAO_ID, COMMENT_USER, REPLY_COMMENT, STATUS', 'numerical', 'integerOnly'=>true),
			array('COMMENT_CONTENT', 'length', 'max'=>200),
			array('CREATE_TIME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMMENT_ID, TUCAO_ID, COMMENT_CONTENT, CREATE_TIME, COMMENT_USER, REPLY_COMMENT, STATUS', 'safe', 'on'=>'search'),
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

		$criteria->compare('COMMENT_ID',$this->COMMENT_ID);

		$criteria->compare('TUCAO_ID',$this->TUCAO_ID);

		$criteria->compare('COMMENT_CONTENT',$this->COMMENT_CONTENT,true);

		$criteria->compare('CREATE_TIME',$this->CREATE_TIME,true);

		$criteria->compare('COMMENT_USER',$this->COMMENT_USER);

		$criteria->compare('REPLY_COMMENT',$this->REPLY_COMMENT);

        $criteria->compare('STATUS', $this->STATUS);

		return new CActiveDataProvider('Tucao_comment', array(
			'criteria'=>$criteria,
		));
	}

    public function getByTc($tucao_id, $offset, $length) {
        $sql = "select
                    COMMENT_ID as comment_id,
                    COMMENT_CONTENT as comment_content,
                    users.NICK_NAME as user_name,
                    users.USER_ID as user_id,
                    tucao_comment.CREATE_TIME as create_time
                from tucao_comment, users
                where tucao_comment.TUCAO_ID= {$tucao_id} and users.USER_ID=tucao_comment.COMMENT_USER
                limit {$offset},{$length} ";
        $rs = Yii::app()->db->createCommand($sql)->queryAll();
        return $rs;
    }

    public function setRead($comment_id) {
        $comment = $this->findByPk($comment_id);
        if($comment == null) {
            return null;
        }
        $comment->STATUS = 1;
        return $comment->save();

    }

    public function support($comment_id, $user_id, $status) {
        if($status != 0 && $status != 1) {
            return null;
        }

        $comm_support = new comment_support();
        //用户不能重复支持或反对同一条吐槽
        $record = $comm_support->findAllByAttributes(array('COMMENT_ID'=>$comment_id, 'USER_ID'=>$user_id));
        if($record != null) {
            return null;
        }
        $comm_support->COMMENT_ID = $comment_id;
        $comm_support->USER_ID = $user_id;
        $comm_support->SUPPORT_STATUS = $status;

        $transaction = Yii::app()->db->beginTransaction(); //创建事务
        try {
            $comm_support->save(false);
            if($status ==1) {
                $rs = $this->updateCounters(array('SUPPORT_NUM'=>1),"COMMENT_ID=$comment_id");
            } else {
                $rs = $this->updateCounters(array('DISAGREE_NUM'=>1),"COMMENT_ID=$comment_id");
            }
            if($rs<=0) {
                $transaction->rollback();
                return null;
            }
            $transaction->commit(); //提交事务会真正的执行数据库操作
            $rtn = true;
        } catch (Exception $e) {
            $transaction->rollback(); //如果操作失败, 数据回滚
            echo $e->getMessage();
            $rtn = null;
        }

        return $rtn;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @return Tucao_comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}