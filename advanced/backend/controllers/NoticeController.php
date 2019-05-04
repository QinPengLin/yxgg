<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/30
 * Time: 上午9:55
 */

namespace backend\controllers;

use Yii;
use backend\models\NoticeInfo;
use yii\data\Pagination;

/**
 * Site controller
 */
class NoticeController extends SiteController
{

    public $enableCsrfValidation = false;

    public function actionIndex(){
        if(Yii::$app->request->isGet) {
            $id = Yii::$app->request->get('id');
            $noticeModel=NoticeInfo::find();
            $data=$noticeModel->where(['id'=>$id])->one();
            if ($data) {
                $data->watch_number=$data['watch_number']+1;
                $data->save();

                /**
                处理上一篇下一篇
                 */
                $totalSize=$noticeModel
                    ->where(['<','creation_time',$data->creation_time])
                    ->andWhere(['game_name_type'=>$data->game_name_type])
                    ->count();
                $totalSize=$totalSize-1;
                $Size=3;
                if($totalSize<0){
                    $Size=2;
                }


                $list = $noticeModel->select([
                    'notice_title',
                    'id',
                    'game_name',
                    'notice_url',
                    'notice_time'])
                    ->where(['game_name_type'=>$data->game_name_type])
                    ->offset($totalSize)->orderBy('id asc')
                    ->limit($Size)
                    ->asArray()
                    ->all();
                $next='';
                $up='';
                foreach ($list as $k=>$v){
                    if($v['id']>$data->id){
                        $next=$v;
                    }
                    if ($v['id']<$data->id){
                        $up=$v;
                    }
                }
                return $this->render('index', ['data' => $data,'next'=>$next,'up'=>$up,'ranking'=>$this->ranking]);
            }
        }

    }

    public function actionHome(){
        if(Yii::$app->request->isGet) {
            return $this->render('home', ['msg' => '首页']);
        }

    }
    public function actionListcolumn(){
        if(Yii::$app->request->isGet) {
            $lumn_type=Yii::$app->request->get('lumn_type');
            $k_g=true;
            $column_name='';//当前菜单名称
            foreach (Yii::$app->params['publicConfig']['column'] as $k=>$v){
                if (!$k_g){
                    break;
                }
                if ($v['mark']==$lumn_type){
                    $k_g=false;
                    $column_name=$k;
                    break;
                }
            }
            if ($k_g){
                return $this->render('myerror', ['msg' => '参数不合法！']);
            }


            $sql="select notice_title,id,game_name,notice_url,notice_time from notice_info where id in(select max(id) from notice_info group by game_name) and game_company='".$column_name."'";
            $data=Yii::$app->db->createCommand($sql)->queryAll();//game_company下面每种游戏最新的公告


            return $this->render('listcolumn', ['data'=>$data,'column_name'=>$column_name,'ranking'=>$this->ranking]);
        }
    }

    public function actionList(){
        if(Yii::$app->request->isGet) {

            $game_name_type=Yii::$app->request->get('game_name_type');
            $k_g=true;
            $game_name='';
            foreach (Yii::$app->params['publicConfig']['column'] as $v){
                if (!$k_g){
                    break;
                }
                if (!empty($v['child'])){
                    foreach ($v['child'] as $lv){
                        if ($lv['mark']==$game_name_type){
                            $k_g=false;
                            $game_name=$lv['name'];
                            break;
                        }
                    }
                }
            }
            if ($k_g){
                return $this->render('myerror', ['msg' => '参数不合法！']);
            }
            //实例化模型
            $noticeModel=NoticeInfo::find();

            //得到多少条数据
            $totalSize=$noticeModel->where(['game_name_type'=>$game_name_type])->count();

            //实例化分页器
            $pageObj=new Pagination(['totalCount' => $totalSize, 'defaultPageSize' => Yii::$app->params['publicConfig']['adminListPag']]);
            //查询本页数据
            $list = $noticeModel->select([
                'notice_title',
                'id',
                'game_name',
                'notice_url',
                'notice_time'])
                ->where(['game_name_type'=>$game_name_type])
                ->offset($pageObj->offset)->orderBy('creation_time desc')
                ->limit($pageObj->limit)
                ->all();

            return $this->render('list', ['game_name'=>$game_name,'data'=>$list,'sun'=>$totalSize,'pagebar'=>$pageObj,'ranking'=>$this->ranking]);
        }

    }

}
