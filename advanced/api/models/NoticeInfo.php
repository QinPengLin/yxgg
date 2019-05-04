<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午4:22
 */


namespace api\models;

use Yii;

/**
 */
class NoticeInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notice_info';
    }

}
