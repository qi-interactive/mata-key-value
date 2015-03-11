<?php

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
class KeyValue extends \matacms\db\ActiveRecord {

    const EVENT_KEY_NOT_FOUND = "event_key_not_found";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mata_keyvalue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['Key'], 'required'],
        [['Key'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'Key' => 'Key',
        'Value' => 'Value',
        ];
    }

    public static function findByKey($key) {
        $model = self::find()->where(["Key" => $key])->one();

        if ($model == null)
            Event::trigger(self::className(), self::EVENT_KEY_NOT_FOUND, new MessageEvent($key));

        return $model != null ? $model->Value : null;
    }
}