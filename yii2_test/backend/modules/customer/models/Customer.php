<?php

namespace backend\modules\customer\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $birth_date
 * @property integer $tel
 * @property integer $age
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'birth_date', 'tel', 'age'], 'required'],
            [['address'], 'string'],
            [['birth_date'], 'safe'],
            [['tel', 'age'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'address' => 'Address',
            'birth_date' => 'Birth Date',
            'tel' => 'Tel',
            'age' => 'Age',
        ];
    }
}
