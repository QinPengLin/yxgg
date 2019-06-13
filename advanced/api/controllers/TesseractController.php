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




        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        $string = strrev($_FILES["img"]["name"]);
        $array = explode('.',$string);
        $hz=strrev($array[0]);


       // $data=Yii::$app->request->post();
        $filename ='update/tesser/'.$msectime.'.'.$hz;
        move_uploaded_file($_FILES["img"]["tmp_name"],$filename);


        $path=str_ireplace('controllers','web/',__DIR__);
        $txt_path=$path.'update/txt/';

        passthru("tesseract ".$path.$filename." ".$txt_path.$msectime."  -l chi_sim");
        $code = file_get_contents($txt_path.$msectime.".txt");
        //删除文件
        //unlink( $path.$filename);
        //unlink( $txt_path.$msectime.".txt" );

        print_r($code);
    }
}