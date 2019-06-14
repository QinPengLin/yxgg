<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/6/14
 * Time: 下午4:18
 */
namespace api\web\Tools;
use api\models\RecordTesseract;
use Yii;
/**
 * 记录用户访问信息
 */
class WriteRecordTesseract
{
    //记录用户访问信息
    public static function Write()
    {
        $ip=Yii::$app->request->userIP;
        $action=Yii::$app->controller->action->id;
        $RecordTesseract=new RecordTesseract();
        $RecordTesseract->access_time=date("Y-m-d H:i:s",time());
        $RecordTesseract->ip=$ip;
        $RecordTesseract->controller=$action;
        $RecordTesseract->save();
    }
}