<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\QuotationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_doc_qu') ?>

    <?= $form->field($model, 'id_company') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'dev_time') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'guaruantee') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
