<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */


	public $breadcrumbs=array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function sendAjax($data, $success=true) {
        if($data !== null || $success == true) {
            $out = array('data'=>$data, 'success'=>$success);
        } else {
            $out = array("success"=>false);
        }
        //print_r($out);
        header("Access-Control-Allow-Origin: *"); # 跨域处理
        echo CJSON::encode($out);
        Yii::app()->end();
    }

    public function sendAjaxJSONP($data, $success=true) {
        if($data !== null || $success == true) {
            $out = array('data'=>$data, 'success'=>$success);
        } else {
            $out = array("success"=>false);
        }
        //print_r($out);
        header("Access-Control-Allow-Origin: *"); # 跨域处理
        $result = CJSON::encode($out);
//        $callback=$_REQUEST['callback'];
//        if($callback!="")
//            echo $callback."($result)";
//        else
            echo "$result";
        //echo "callback(".CJSON::encode($out).")";
        Yii::app()->end();
    }
}