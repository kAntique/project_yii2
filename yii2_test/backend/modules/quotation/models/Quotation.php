<?php

namespace backend\modules\quotation\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property integer $id
 * @property string $id_doc_qu
 * @property integer $id_company
 * @property integer $id_customer
 * @property string $date
 * @property string $dev_time
 * @property string $payment
 * @property string $guaruantee
 *
 * @property Detail[] $details
 * @property Company $idCompany
 * @property Customer $idCustomer
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doc_qu','id_company', 'id_customer', 'date', 'dev_time', 'payment', 'guaruantee'], 'required'],
            [['id_company', 'id_customer'], 'integer'],
            [['payment'], 'string'],
            [['id_doc_qu'], 'string', 'max' => 10],
            [['date'], 'string', 'max' => 25],
            [['dev_time'], 'string', 'max' => 45],
            [['guaruantee'], 'string', 'max' => 100],
            //[['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['id_company' => 'id']],
            //[['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสใบเสนอราคา',
            'id_doc_qu' => 'รหัสเอกสารใบเสนอราคา',
            'id_company' => 'รหัสบริษัท',
            'id_customer' => 'รหัสลูกค้า',
            'date' => 'วันที่ออกใบเสนอราคา',
            'dev_time' => 'ระยะเวลาในการทำงานทั้งหมด',
            'payment' => 'การจ่ายเงิน',
            'guaruantee' => 'การรับประกันชิ้นงาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(Detail::className(), ['id_quotation' => 'id']);
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
    //public function getLastInsertID()
    //{
      //return ['id_quotation'=> 'id'];
    //}
}
