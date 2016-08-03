<?php

namespace backend\modules\company\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property string $website
 * @property string $bank_info
 * @property string $pic_stamp
 * @property string $pic_logo
 * @property string $pic_signature
 * @property string $tax
 * @property string $manager
 *
 * @property Quotation[] $quotations
 * @property Receipt[] $receipts
 */
class Company extends \yii\db\ActiveRecord
{
  public $logocompany_img;
  public $stampcompany_img;
  public $signaturecompany_img;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone_number', 'email', 'website', 'bank_info', 'pic_stamp', 'pic_logo', 'pic_signature', 'tax', 'manager'], 'required'],
            [['tax'], 'string'],
            [['name', 'phone_number', 'email', 'website', 'bank_info', 'pic_stamp', 'pic_logo', 'pic_signature'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 500],
            [['manager'], 'string', 'max' => 45],
            [['logocompany_img'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['stampcompany_img'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['signaturecompany_img'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสบริษัท',
            'name' => 'ชื่อบริษัท',
            'address' => 'ที่อยู่บริษัท',
            'phone_number' => 'เบอ์โทรศัพท์',
            'email' => 'อีเมล',
            'website' => 'เว็บไซต์',
            'bank_info' => 'บัญชีธนาคาร',
            'pic_stamp' => 'รูปตราประทับบริษัท',
            'pic_logo' => 'รูปสัญลักษณ์บริษัท',
            'pic_signature' => 'รูปลายเซน',
            'tax' => 'เลขประจำตัวผู้เสียภาษี',
            'manager' => 'ชื่อผู้เซนอนุมัติ',
            'logocompany_img' => 'รูปสัญลักษณ์บริษัท',
           'stampcompany_img' => 'รูปตราประทับบริษัท',
            'signaturecompany_img' => 'รูปลายเซน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotations()
    {
        return $this->hasMany(Quotation::className(), ['id_company' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipts()
    {
        return $this->hasMany(Receipt::className(), ['id_company' => 'id']);
    }
}
