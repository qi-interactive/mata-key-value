<?php

namespace mata\keyvalue\models;

use Yii;

/**
 * This is the model class for table "mata_keyvalue".
 *
 * @property string $Key
 * @property string $Value
 */
class KeyValue extends \mata\db\ActiveRecord {
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
        [['Key', 'Value'], 'required'],
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
}