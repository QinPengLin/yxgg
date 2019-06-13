<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/6/12
 * Time: 下午5:43
 */
namespace api\controllers;

use Yii;
use api\web\Tools\Msg;

/**
 * Site controller
 */
class TesseractController extends SiteController
{

    public $enableCsrfValidation = false;

    public function actionIdentify(){


        $data=Yii::$app->request->post();

        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        $string = strrev($_FILES["img"]["name"]);
        $array = explode('.',$string);
        $hz=strrev($array[0]);
        $mg_hz_arr=array('png','jpeg','jpg');
        if (!in_array($hz,$mg_hz_arr)){
            return Msg::message($mg_hz_arr, -4, "目前支持图片!");
        }
        if (empty($data['ztk']) || !isset($data['ztk'])){
            $data['ztk']='eng';
        }
        $ztk=array('chi_sim','eng');
        if (!in_array($data['ztk'],$ztk)){
            return Msg::message($ztk, -4, "目前支持字体库!");
        }



        $filename ='update/tesser/'.$msectime.'.'.$hz;
        move_uploaded_file($_FILES["img"]["tmp_name"],$filename);


        $path=str_ireplace('controllers','web/',__DIR__);
        $txt_path=$path.'update/txt/';

        if ($data['ztk']=='eng') {
            passthru("tesseract " . $path . $filename . " " . $txt_path . $msectime);
        }else{
            passthru("tesseract " . $path . $filename . " " . $txt_path . $msectime . "  -l ".$data['ztk']);
        }
        $code = file_get_contents($txt_path.$msectime.".txt");
        //删除文件
        unlink( $path.$filename);
        unlink( $txt_path.$msectime.".txt" );

        return Msg::message($code, 1, "成功!");
        
    }
}