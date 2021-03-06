<?php
 
/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace mata\keyvalue\models;

use Yii;
use yii\base\Event;
use mata\base\MessageEvent;

/**
 * This is the model class for table "mata_keyvalue".
 *
 * @property string $Key
 * @property string $Value
 */
class KeyValue extends \mata\db\ActiveRecord {

    const EVENT_KEY_NOT_FOUND = "event_key_not_found";

    public static function tableName() {
        return 'mata_keyvalue';
    }

    public function rules()
    {
        return [
        [['Key'], 'required'],
        [['Key'], 'string'],
        [['Value'], 'safe']
        ];
    }

    public function attributeLabels() {
        return [
        'Key' => 'Key',
        'Value' => 'Value',
        ];
    }

    public static function findByKey($key) {
        $model = self::find()->where(["Key" => $key])->one();

        if ($model == null)
            Event::trigger(self::className(), self::EVENT_KEY_NOT_FOUND, new MessageEvent($key));

        return $model;
    }

    public static function findValue($key) {
        $model = self::find()->where(["Key" => $key])->one();

        if ($model == null)
            Event::trigger(self::className(), self::EVENT_KEY_NOT_FOUND, new MessageEvent($key));

        return $model != null ? $model->Value : null;
    }
}