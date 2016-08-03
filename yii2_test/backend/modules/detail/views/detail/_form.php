<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\quotation\models\Quotation;
use backend\modules\receipt\models\Receipt;

/* @var $this yii\web\View */
/* @var $model backend\modules\detail\models\Detail */
/* @var $form yii\widgets\ActiveForm */
$this->title = $model->id;
?>

<div class="detail-form">

    <?php $form = ActiveForm::begin(); ?>


      <?= $form->field($model, 'id_doc_qu')->textInput(['readonly' => true, 'value' => 'PNS-Qu-'.$idQuotation]) ?>
      <?= $form->field($model, 'id_doc_re')->textInput(['readonly' => true, 'value' => 'PNS-Qu-'.$idQuotation]) ?>


    <!--?= $form->field($model, 'quotation_id')->dropDownList($model,['prompt'=>'Select quotation']) ?-->

    <!--?= $form->field($model, 'receipt_id')->dropDownList($model,['prompt'=>'Select quotation']) ?-->

    <?= $form->field($model, 'product_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
