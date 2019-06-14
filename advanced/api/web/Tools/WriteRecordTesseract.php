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
 * post和get请求类
 */
class WriteRecordTesseract
{
    /** Json数据格式化
     * @param  Mixed  $data   数据
     * @param  String $indent 缩进字符，默认4个空格
     * @return JSON
     */
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