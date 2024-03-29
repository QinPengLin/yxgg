<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/6/12
 * Time: 下午5:43
 */
namespace api\controllers;

use api\models\RecordTesseract;
use api\web\Tools\JsonFormat;
use api\web\Tools\Request;
use api\web\Tools\WriteRecordTesseract;
use Yii;
use api\web\Tools\Msg;

/**
 * Site controller
 */
class TesseractController extends SiteController
{

    public $enableCsrfValidation = false;

    public function actionIdentify(){
        WriteRecordTesseract::Write();
        $err=array('错误');
        if(!Yii::$app->request->isPost)return Msg::message($err, -4, "非法提交!");
        $data=Yii::$app->request->post();


        if (!isset($_FILES["img"]) || empty($_FILES["img"])){
            return Msg::message($err, -4, "图片上传不能为空!");
        }

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
        if (file_exists($path.$filename)){
            unlink( $path.$filename);
        }
        if (file_exists($txt_path.$msectime.".txt")){
            unlink( $txt_path.$msectime.".txt");
        }

        return Msg::message($code, 1, "成功!");

    }

    public function actionDemo(){
        $count = RecordTesseract::find()
            ->where(['controller'=>Yii::$app->controller->action->id])
            ->count();
        if(!Yii::$app->request->isPost) {
            WriteRecordTesseract::Write();
            return $this->render('demo', ['msg' => '识别图像中文字','count'=>$count]);
        }else{
            WriteRecordTesseract::Write();
            $data=Yii::$app->request->post();

            list($msec, $sec) = explode(' ', microtime());
            $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
            $string = strrev($_FILES["img"]["name"]);
            $array = explode('.',$string);
            $hz=strrev($array[0]);


            $filename ='update/imgs/'.$msectime.'.'.$hz;
            move_uploaded_file($_FILES["img"]["tmp_name"],$filename);

            $path=str_ireplace('controllers','web/',__DIR__);
            try {


                $file = array(
                    'img' => new \CURLFile(realpath($path.$filename))
                );

                $datas=array_merge($file, $data);
                $re= Request::curlRequest('http://ggj.api.qinpl.cn/index.php?r=tesseract/identify', $datas);

            } catch (Exception $e) {
                if (file_exists($path.$filename)){
                    unlink( $path.$filename);
                }
            } catch (Error $e) {
                if (file_exists($path.$filename)){
                    unlink( $path.$filename);
                }
            }
            if (file_exists($path.$filename)){
                unlink( $path.$filename);
            }

            if (!isset($re) || empty($re)){
                $arr=array('错误','查看参数是否齐全');
            }else {
                $arr = json_decode($re, true);
            }
            $reStr=JsonFormat::jsonFormat($arr);
            return $this->render('demo', ['msg' => '识别图像中文字','re' => $reStr,'count'=>$count]);


        }
    }
}