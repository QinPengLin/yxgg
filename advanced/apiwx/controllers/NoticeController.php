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
}
