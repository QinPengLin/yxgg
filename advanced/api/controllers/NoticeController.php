<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午5:59
 */
namespace api\controllers;

use Yii;
use api\web\Tools\Msg;
use api\web\Tools\Zil;
use api\models\NoticeInfo;

/**
 * Site controller
 */
class NoticeController extends SiteController
{

    public $enableCsrfValidation = false;

    public function actionApiadd(){
        if(!Yii::$app->request->isPost)return Msg::message([], -4, "非法提交!");
            $data=Yii::$app->request->post();

            $data=Zil::zilStr($data);

            //$myfile = fopen("online_notify.txt", "a") or die("Unable to open file!");
            //fwrite($myfile, json_encode($data).'\n');
            //fclose($myfile);
            $game_name_type='';
            foreach (Yii::$app->params['apiConfig']['game_name'] as $k=>$v){
                if ($v==$data['game_name']){
                    $game_name_type=$k;
                    break;
                }
            }

            $notice_md=new NoticeInfo();
            $notice_md->notice_content=$data['notice_content'];
            $notice_md->port_type=$data['port_type'];
            $notice_md->game_company=$data['game_company'];
            $notice_md->game_name=$data['game_name'];
            $notice_md->game_name_type=$game_name_type;
            $notice_md->creation_time=time();
            $notice_md->notice_time=$data['notice_time'];
            $notice_md->notice_title=$data['notice_title'];
            $notice_md->notice_url=$data['notice_url'];
            $notice_md->watch_number=0;
            $notice_md->save();

    }
    public function actionUp()
    {
        $file=file_get_contents("php://input");
        $file_name = date('Ymd').'/';
        $destination_folder='update/'.$file_name; //上传文件路径
        if(!file_exists($destination_folder)){
            mkdir($destination_folder);
        }
        $filename = date('YmdHis').rand(10000,99999);
        $file_data = $destination_folder.$filename.".jpg"; //完成路径
        if (!file_put_contents($file_data,$file)){//写入文件中！
            return  Msg::message([], 0, '文件写入失败！');
        }
        return  $_SERVER['SERVER_NAME'].'/'.$file_data;
    }
    public function actionNewnotice(){
        $sql='select notice_url,game_name_type,id,game_name from notice_info as a where creation_time = (select max(b.creation_time) from notice_info as b where a.game_name_type = b.game_name_type )';
        $data=Yii::$app->db->createCommand($sql)->queryAll();
        $re_data=array();
        foreach ($data as $k=>$v){
            $re_data[$v['game_name_type']]=array('href'=>$v['notice_url']);
        }
        return json_encode($re_data);
    }
}
