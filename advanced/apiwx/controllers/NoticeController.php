<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午5:59
 */
namespace apiwx\controllers;

use apiwx\models\Log;
use Yii;
use apiwx\web\Tools\Msg;
use apiwx\web\Tools\Zil;
use apiwx\models\NoticeInfo;

/**
 * Site controller
 */
class NoticeController extends SiteController
{

    public $enableCsrfValidation = false;
    public function actionNoticelist(){
        $re_data=array('测试','测试二');
        return json_encode($re_data);
    }
    public function actionGetmenu(){//小程序获取菜单
        $menus=Yii::$app->view->params['column']=Yii::$app->params['publicConfig']['column'];

        return json_encode($menus);
    }
    public function actionGetcontent()
    {//小程序获取内容页
        $id=Yii::$app->request->post('id');
        $noticeModel=NoticeInfo::find();
        $data=$noticeModel->where(['id'=>$id])->one();
        if ($data) {
            $data->wx_watch_number = $data['wx_watch_number'] + 1;
            $data->save();
        }
        $data['notice_content']=html_entity_decode($data['notice_content']);
        $re_data=array();
        foreach ($data as $k=>$v){
            $re_data[$k]=$v;
        }
        return json_encode($re_data);
    }
    public function actionGetlog(){//获取更新日志
        $type=Yii::$app->request->post('type');
        if(!empty($type) && $type=='wxxcxjj'){//获取小程序简介
            $list = Log::find()
                ->Where(['type'=>'wxxcxjj'])
                ->orderBy('id desc')
                ->asArray()
                ->one();
            $list['time']=date("Y-m-d H:i:s",$list['time']);
        }else{
            $list = Log::find()
                ->Where(['type'=>'wxx'])
                ->orWhere(['type' => 'all'])
                ->orderBy('id desc')
                ->asArray()
                ->all();
            foreach ($list as $k=>$v){
                $list[$k]=$v;
                $list[$k]['time']=date("Y-m-d H:i:s",$v['time']);
            }
        }

        return json_encode($list);
    }
    public function actionGetindexlist()
    {//小程序获取首页内容列表
       //实例化模型
        $Size=8;
        $pag=Yii::$app->request->post('page');
        if (isset($pag) and  !empty($pag)){
            $totalSize=$pag*$Size;
            $pg=$pag;
        }else{
            $totalSize=0;
            $pg=0;
        }
        $noticeModel=NoticeInfo::find();
        if ($pg==0){
            $s=0;
            $sp=0;
        }else{
            $sp=1;
            $s=$pg-1;
        }
        $type=Yii::$app->request->post('type');
        $is_type=false;
        if (isset($type) && !empty($type)) {
           $column= Yii::$app->params['publicConfig']['column'];
           foreach ($column as $v){
               if (!empty($v['child'])){
                   foreach ($v['child'] as $vs){
                       if ($vs['mark']==$type){
                           $is_type=true;
                           break;
                       }
                   }
               }
               if ($is_type){
                   break;
               }
           }
           if ($is_type){
               $count = $noticeModel
                   ->where(['game_name_type'=>$type])
                   ->count();
           }else{
               return json_encode('参数不合法！');
           }
        }else{
            $count = $noticeModel->count();
        }
        $s_page=$count/$Size;
        if ($pg+1>$s_page || $pg+1==$s_page){
            $x=false;
        }else{
            $x=$pg+1;
        }

        if($is_type) {
            //查询本页数据
            $list = $noticeModel->select([
                'notice_title',
                'id',
                'game_company',
                'game_name',
                'game_name_type',
                'notice_url',
                'notice_time'])
                ->where(['game_name_type'=>$type])
                ->offset($totalSize)->orderBy('id desc')
                ->limit($Size)
                ->asArray()
                ->all();
        }else{
            $list = $noticeModel->select([
                'notice_title',
                'id',
                'game_company',
                'game_name',
                'game_name_type',
                'notice_url',
                'notice_time'])
                ->offset($totalSize)->orderBy('id desc')
                ->limit($Size)
                ->asArray()
                ->all();
        }
        $c=Yii::$app->view->params['column']=Yii::$app->params['publicConfig']['column'];
        foreach ($list as $k=>$v){
            $list[$k]=$v;
            $list[$k]['mark']=$c[$v['game_company']]['mark'];
        }
        $re=array(
            'list'=>$list,
            'page'=>array(
                's'=>$s,
                'x'=>$x,
                'sp'=>$sp,
                'd'=>$pag+1
            )
        );
        return json_encode($re);
    }
}
