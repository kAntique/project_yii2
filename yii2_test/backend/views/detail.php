<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\receipt\models\Receipt */
/* @var $form ActiveForm */
?>
<div class="detail">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_company') ?>
        <?= $form->field($model, 'id_customer') ?>
        <?= $form->field($model, 'date') ?>
        <?= $form->field($model, 'id_doc_re') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- detail -->
