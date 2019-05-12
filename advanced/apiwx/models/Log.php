<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/5/13
 * Time: 上午12:24
 */
namespace apiwx\models;

use Yii;

/**
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

}