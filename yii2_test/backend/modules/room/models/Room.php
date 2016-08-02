<?php

namespace backend\modules\room\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $type
 * @property integer $color
 * @property string $detail
 * @property string $picture
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'color', 'detail', 'picture'], 'required'],
            [['name', 'type', 'color'], 'integer'],
            [['detail', 'picture'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'color' => 'Color',
            'detail' => 'Detail',
            'picture' => 'Picture',
        ];
    }
}
