<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/6/14
 * Time: 下午4:15
 */
namespace api\models;

use Yii;

/**
 */
class RecordTesseract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record_tesseract';
    }

}