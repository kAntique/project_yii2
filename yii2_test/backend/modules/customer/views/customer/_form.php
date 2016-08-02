<?php
use dosamigos\editable\Editable;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\customer\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'address')->widget(Editable::className(), [ 'url' => 'site/test', 'type' => 'address' ]);?>
    <?php echo '<b>วันเดือนปีเกิด :</b>'; ?>
    <?= Editable::widget([ 'model' => $model, 'attribute' => 'birth_date',
     'url' => 'site/test', 'type' => 'datetime', 'mode' => 'pop',
      'clientOptions' => [ 'placement' => 'right', 'format' => 'yyyy-mm-dd hh:ii',
      'viewformat' => 'dd/mm/yyyy hh:ii', 'datetimepicker' => [ 'orientation' => 'top auto' ] ] ]);?>

    <?= $form->field($model, 'tel')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
