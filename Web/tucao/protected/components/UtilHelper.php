<?php
/**
 * Created by PhpStorm.
 * User: gongchen
 * Date: 14-12-9
 * Time: 下午11:38
 */
class UtilHelper {
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