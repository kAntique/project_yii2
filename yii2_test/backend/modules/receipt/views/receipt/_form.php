<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\company\models\Company;
use backend\modules\customer\models\Customer;
use backend\modules\receipt\models\Receipt;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal ;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\Sort;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\modules\receipt\models\Receipt */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="receipt-form">

  <div class="row" >
          <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

              <?= $form->field($model, 'id_doc_re')->textInput([ 'rendonly'=>true,'value' => 'PNS-Rc-'.$id_doc]) ?>


              <h4><?= Html::encode('บริษัท') ?></h4>
              <?= Html::activeDropDownList($model, 'id_company',
                ArrayHelper::map(Company::find()->all(), 'id', 'name')) ?><br><br>

                <?= Html::encode('ลูกค้า') ?>
                <?= Html::activeDropDownList($model, 'id_customer',
                  ArrayHelper::map(Customer::find()->all(), 'id', 'name')) ?><br><br>


                  <?= Html::encode('วันที่ออกใบเสร็จ') ?>
                  <?= DatePicker::widget([
                      'model' => $model,
                      'attribute' => 'date',
                      'template' => '{addon}{input}',
                          'clientOptions' => [
                              'autoclose' => true,
                              'format' => 'dd-M-yyyy'
                              ]
                    ]);?><br><br>


                  <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                  </div>

              <?php ActiveForm::end(); ?>
          </div>
      </div>
  </div>
