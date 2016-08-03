<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\quotation\models\Quotation;
use backend\modules\receipt\models\Receipt;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model backend\modules\detail\models\Detail */
/* @var $form yii\widgets\ActiveForm */
$this->title = $model->id;
$this->registerJs(
   '$("document").ready(function(){
        $("#new_detail").on("pjax:end", function() {
            $.pjax.reload({container:"#detail"});  //Reload GridView
        });
    });'
);
?>

<div class="detail-form">

<?php yii\widgets\Pjax::begin(['id' => 'new_detail']) ?>
    <?php $form = ActiveForm::begin(); ?>




<?= $form->field($model, 'quotation_id')->textInput([ 'type'=>'hidden','value' =>$q ]) ?>
    <!--?= $form->field($model, 'quotation_id')->dropDownList($model,['prompt'=>'Select quotation']) ?-->

    <!--?= $form->field($model, 'receipt_id')->dropDownList($model,['prompt'=>'Select quotation']) ?-->

    <?= $form->field($model, 'product_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


    </div>
    <?php ActiveForm::end(); ?>
  <?php yii\widgets\Pjax::end() ?>

</div>
