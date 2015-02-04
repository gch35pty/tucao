<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-12-7
 * Time: 下午2:50
 */

class TucaoNearForm extends CFormModel {
    public $user_id;
    public $lat;
    public $lng;
    public $distance;
    public $offset;
    public $length;
    public $lastTime;

    public function rules() {
        return array(
            array('user_id, distance', 'numerical', 'integerOnly'=>true),
            array("offset", 'numerical', 'integerOnly'=>true, 'min'=>0),
            array('length', 'numerical', 'integerOnly'=>true, 'min'=>1),
            array('lat, lng','numerical'),
            array('lastTime', 'length', "min"=>8)
        );
    }

    public function searchNew() {
        $timeCon = "";
        if(isset($this->lastTime)) {
            $timeCon = " and CREATE_TIME < '".$this->lastTime."' ";
        }
        if(!isset($this->offset) || !isset($this->length)) {
            $this->offset = 0;
            $this->length = 10;
        }
        if(isset($this->lat) && isset($this->lng) && isset($this->distance) && $this->distance>0) {
            $location = UtilHelper::getLocationSize($this->lat, $this->lng, $this->distance);
            $lat_left = $location['lat_left'];
            $lat_right = $location['lat_right'];
            $lng_left = $location['lng_left'];
            $lng_right = $location['lng_right'];
            //print_r($location);
            $sql = "select *,GETDISTANCE(LADTITUDE, LONGITUDE, {$this->lat},{$this->lng}) as distanceFrom,
                        users.NICK_NAME as user_name
                    from tucao, users
                    where
                        users.USER_ID = tucao.USER_ID and
                        LADTITUDE between $lat_left and $lat_right and
                        LONGITUDE between $lng_left and $lng_right ".
                        "and (
	                        DISTANCE > GETDISTANCE (
		                    LADTITUDE,LONGITUDE,{$this->lat},{$this->lng}
	                        ) OR (
		                        DISTANCE = 0
	                        )
	                    )"
                        .$timeCon.
                        " order by tucao.CREATE_TIME desc limit {$this->offset},{$this->length} ";
        }
        else {
            $sql = "select *, null as distanceFrom from tucao ".$timeCon.
                        " order by tucao.CREATE_TIME desc limit {$this->offset},{$this->length}";
        }
        //echo $sql;
        $rs = Yii::app()->db->createCommand($sql)->queryAll();
        return $rs;

    }

    public function searchHot() {
        //$scoreCon =" order by (COMMENT_NUM*5 + SUPPORT_NUM*2 + DISAGREE_NUM + SHARE_NUM*3) desc";
        $scoreCon = UtilHelper::getHotCalSql();
        if(is_null($this->offset) || is_null($this->length)) {
            $this->offset = 0;
            $this->length = 10;
        }
        if(isset($this->lat) && isset($this->lng) && isset($this->distance) && $this->distance>0) {
            $location = UtilHelper::getLocationSize($this->lat, $this->lng, $this->distance);
            $lat_left = $location['lat_left'];
            $lat_right = $location['lat_right'];
            $lng_left = $location['lng_left'];
            $lng_right = $location['lng_right'];
            $sql = "select tucao.*,GETDISTANCE(LADTITUDE, LONGITUDE, {$this->lat},{$this->lng}) as distanceFrom,
                        users.NICK_NAME as user_name
                    from tucao, users
                    where
                        users.USER_ID = tucao.USER_ID and
                        LADTITUDE between $lat_left and $lat_right and
                        LONGITUDE between $lng_left and $lng_right ".
                        "and (
	                        DISTANCE > GETDISTANCE (
		                    LADTITUDE,LONGITUDE,{$this->lat},{$this->lng}
	                        ) OR (
		                        DISTANCE = 0
	                        )
	                    ) ".$scoreCon." limit {$this->offset},{$this->length}";
        }
        else {
            $sql = "select tucao.*, null as distanceFrom, users.NICK_NAME as user_name from tucao, users
                    where users.USER_ID = tucao.USER_ID ".$scoreCon." limit {$this->offset},{$this->length}";
        }
        //echo $sql;
        $rs = Yii::app()->db->createCommand($sql)->queryAll();
        return $rs;
    }

}