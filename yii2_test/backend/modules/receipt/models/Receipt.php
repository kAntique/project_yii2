<?php

namespace backend\modules\receipt\models;

use Yii;
use backend\modules\company\models\Company;
use backend\modules\customer\models\Customer;
use dosamigos\datepicker\DatePicker;

/**
 * This is the model class for table "receipt".
 *
 * @property integer $id
 * @property integer $id_company
 * @property integer $id_customer
 * @property string $date
 * @property string $id_doc_re
 *
 * @property Detail[] $details
 * @property Company $idCompany
 * @property Customer $idCustomer
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_company', 'id_customer', 'date', 'id_doc_re'], 'required'],
            [['id_company', 'id_customer'], 'integer'],
            [['date'], 'string', 'max' => 25],
            [['id_doc_re'], 'string', 'max' => 20],
           [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['id_company' => 'id']],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสใบเสร็จ',
            'id_company' => 'รหัสบริษัท',
            'id_customer' => 'รหัสลูกค้า',
            'date' => 'วันที่ออกใบเสร็จ',
            'id_doc_re' => 'รหัสเอกสารใบเสร็จ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(Detail::className(), ['id_receipt' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'id_company']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'id_customer']);
    }
}
