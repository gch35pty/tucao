<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-12-17
 * Time: 下午10:40
 */

class NotificationForm extends CFormModel {
    public $user_id;
    public $offset;
    public $length;

    public function rules() {
        return array(
            array('user_id', 'numerical', 'integerOnly'=>true),
            array("offset", 'numerical', 'integerOnly'=>true, 'min'=>0),
            array('length', 'numerical', 'integerOnly'=>true, 'min'=>1)
        );
    }

    /*
     * 这个sql很复杂，以后可能会考虑使用一张临时的notification表来存储冗余的未读数据
     * 这里拼接了两个sql分别查询出回复吐槽的评论，和回复评论的评论
     */
    public function getUnreadComment() {
        $sql = "SELECT
	              c1.COMMENT_ID AS comment_id,
	              c1.COMMENT_CONTENT AS content,
	              c1.CREATE_TIME AS create_time,
	              c1.TUCAO_ID AS tucao_id,
	              c1.COMMENT_USER AS user_id,
	              users.NICK_NAME AS user_name,
	              c1.REPLY_COMMENT AS reply_comment,
	              SUBSTR(tucao.CONTENT,1,15) AS reply_content
                FROM
	              users,
	              tucao,
	              tucao_comment c1
                WHERE
	              tucao.USER_ID = {$this->user_id}
                  AND c1.TUCAO_ID = tucao.TUCAO_ID
                  AND c1. STATUS = 0
                  AND c1.REPLY_COMMENT = 0
                  AND users.USER_ID = c1.COMMENT_USER
                  AND c1.COMMENT_USER != {$this->user_id}
            UNION
	            SELECT
		          c1.COMMENT_ID AS comment_id,
		          c1.COMMENT_CONTENT AS content,
                  c1.CREATE_TIME AS create_time,
                  c1.TUCAO_ID AS tucao_id,
                  c1.COMMENT_USER AS user_id,
                  users.NICK_NAME AS user_name,
                  c1.REPLY_COMMENT AS reply_comment,
                  SUBSTR(c2.COMMENT_CONTENT,1,15) AS reply_content
	        FROM
                  users,
                  tucao_comment c1,
                  tucao_comment c2
	        WHERE
		          c2.COMMENT_USER = {$this->user_id}
                  AND c1. STATUS = 0
                  AND c1.REPLY_COMMENT = c2.COMMENT_ID
                  AND users.USER_ID = c1.COMMENT_USER
                  AND c1.COMMENT_USER != {$this->user_id}
            LIMIT {$this->offset},{$this->length}";
        //echo $sql;
        $rs = Yii::app()->db->createCommand($sql)->queryAll();
        return $rs;
    }


}