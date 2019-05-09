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
        //获取以game_name_type分组创建时间比每组创建最大时间少86400的数据
        //$sql='select notice_url,game_name_type,id,game_name from notice_info as a where creation_time > ((select max(b.creation_time) from notice_info as b where a.game_name_type = b.game_name_type )-86400)';
        //获取以game_name_type分组创建时间最晚的前10的数据并且以creation_time排序
        $sql='select notice_url,game_name_type,id,game_name from notice_info a where 50 > (select count(*) from notice_info where game_name_type = a.game_name_type and creation_time > a.creation_time ) order by  a.creation_time desc';
        $data=Yii::$app->db->createCommand($sql)->queryAll();
        $re_data=array();
        foreach ($data as $k=>$v){
            $re_data[$v['game_name_type']][]=array(
                'href'=>$v['notice_url']
                //'id'=>$v['id'],
                //'game_name_type'=>$v['game_name_type']
            );
        }
        return json_encode($re_data);
    }
    public function actionNoticelist(){
        $re_data=array();
        foreach (Yii::$app->params['apiConfig']['NoticeList'] as $k=>$v){
            if ($v['state']==1){
                unset($v['state']);
                $re_data[$k]=$v;
            }
        }
        return json_encode($re_data);
    }
}
