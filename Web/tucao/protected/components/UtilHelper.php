<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-12-9
 * Time: 下午11:38
 */
class UtilHelper {

    public static $__ScoreByComment = 3;
    public static $__ScoreByAgree = 1;
    public static $__ScoreByApply = 5;

    /**
     * @param $score
     * 判断用户是否需要升级，并进行升级
     * 小于100分，一级
     * 100~300分，二级
     * 300~500分，三级
     * 500~1000分，四级
     * 1000~2000分，五级
     * 2000分以上，六级
     */
    public static function ifUpgradeUser($newScore,$user_id, $level) {
        $user = new Users();
        $newLevel = $level;
//        $loginUser = Yii::app()->user;
//        echo("</br>");
//        print_r($loginUser->getState('nick_name'));
//        echo("</br>");
        if($newScore<100) {
            $newLevel = 1;
        }
        else if($newScore<300) {
            $newLevel = 2;
        }
        else if($newScore<500) {
            $newLevel = 3;
        }
        else if($newScore<1000) {
            $newLevel = 4;
        }
        else if($newScore<2000) {
            $newLevel = 5;
        }
        else {
            $newLevel = 6;
        }
        if($newLevel != $level) {
            $user->updateAll(array('LEVEL'=>$newLevel),"USER_ID=$user_id");
            return true;
        }
        return false;
    }

    public static function getLocationSize($lat,$lng, $distance) {
        if(!isset($lat) || !isset($lng) || !isset($distance)) {
            return null;
        }
        $dlng =  2 * asin(sin($distance /1000/ (2 * 6371)) / cos(deg2rad($lat)));
        $dlng = rad2deg($dlng);
        $dlat = $distance/1000/6371;
        $dlat = rad2deg($dlat);
        //echo $dlng;
        if($dlat>0) {
            $lat_left = $lat - $dlat;
            $lat_right = $lat + $dlat;
        } else {
            $lat_left = $lat + $dlat;
            $lat_right = $lat - $dlat;
        }
        if($dlng>0) {
            $lng_left = $lng - $dlng;
            $lng_right = $lng + $dlng;
        } else {
            $lng_left = $lng + $dlng;
            $lng_right = $lng - $dlng;
        }

        $location = array(
            "lat_left"=>$lat_left,
            "lat_right"=>$lat_right,
            "lng_left"=>$lng_left,
            "lng_right"=>$lng_right
        );
        return $location;
    }

    public static function getHotCalSql() {
        $scoreCon =" order by (COMMENT_NUM*5 + SUPPORT_NUM*2 + DISAGREE_NUM + SHARE_NUM*3) desc";
        return $scoreCon;
    }

    public static function checkNumParam($param)
    {
        if(isset($param) && is_numeric($param)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkLoginU($user_id) {
        if(isset($user_id) && $user_id == Yii::app()->user->id) {
            return true;
        } else {
            return false;
        }
    }
}