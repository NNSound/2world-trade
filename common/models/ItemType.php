<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_type".
 *
 * @property int $id
 * @property string $name 類型
 */
class ItemType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '類型',
        ];
    }
}
