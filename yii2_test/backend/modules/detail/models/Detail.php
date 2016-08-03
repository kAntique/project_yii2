<?php

namespace backend\modules\detail\models;

use Yii;
use backend\modules\quotation\models\Quotation;
use backend\modules\receipt\models\Receipt;
/**
 * This is the model class for table "detail".
 *
 * @property integer $id
 * @property string $product_description
 * @property string $quantity
 * @property double $unit_price
 * @property integer $quotation_id
 * @property integer $receipt_id
 *
 * @property Quotation $quotation
 * @property Receipt $receipt
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_description', 'quantity', 'unit_price'], 'required'],
            [['unit_price'], 'number'],
            [['quotation_id', 'receipt_id'], 'integer'],
            [['product_description'], 'string', 'max' => 500],
            [['quantity'], 'string', 'max' => 45],
            [['quotation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quotation::className(), 'targetAttribute' => ['quotation_id' => 'id']],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::className(), 'targetAttribute' => ['receipt_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสรายละเอียด',
            'product_description' => 'รายละเอียดงาน',
            'quantity' => 'จำนวนงานที่ทำ',
            'unit_price' => 'ราคา/หน่วย',
            'quotation_id' => 'Quotation ID',
            'receipt_id' => 'Receipt ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotation()
    {
        return $this->hasOne(Quotation::className(), ['id' => 'quotation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(Receipt::className(), ['id' => 'receipt_id']);
    }
}
