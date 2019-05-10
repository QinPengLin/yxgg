<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午5:59
 */
namespace apiwx\controllers;

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
        $count=$noticeModel->count();
        $s_page=$count/$Size;
        if ($pg+1>$s_page || $pg+1==$s_page){
            $x=false;
        }else{
            $x=$pg+1;
        }

        //查询本页数据
        $list = $noticeModel->select([
            'notice_title',
            'id',
            'game_company',
            'game_name',
            'notice_url',
            'notice_time'])
            ->offset($totalSize)->orderBy('id desc')
            ->limit($Size)
            ->asArray()
            ->all();
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
