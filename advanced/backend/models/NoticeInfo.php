<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午4:22
 */


namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property integer $order_publisher_id
 * @property integer $order_recipient_id
 * @property integer $order_task_id
 * @property integer $order_type
 * @property integer $order_del
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
