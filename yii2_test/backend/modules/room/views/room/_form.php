<?php
use dosamigos\selectize\SelectizeTextInput;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;
use dosamigos\selectize\SelectizeDropDownList;
/* @var $this yii\web\View */
/* @var $model backend\modules\room\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
<?php echo '<b>ประเภทห้อง : </b>';?>
    <?php echo SelectizeTextInput::widget([ 'name' => 'type',
    'value' => 'sweet', 'clientOptions' => [  [] ], ]);
    echo SelectizeTextInput::widget([ 'name' => 'type',
    'value' => 'single', 'clientOptions' => [  [] ], ]);
    echo SelectizeTextInput::widget([ 'name' => 'type',
    'value' => 'vip', 'clientOptions' => [  [] ], ]); ?>

    <?php echo $form->field($model, 'color')->widget(ColorInput::classname(), [
    'options' => ['placeholder' => 'Select color ...'] ]);?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?php echo '<b>รูปห้อง : </b>';?>
    <?= FileUploadUI::widget([ 'model' => $model, 'attribute' => 'picture',
    'url' => ['media/upload', 'id' => $model], 'gallery' => false,
     'fieldOptions' => [ 'accept' => 'image/*' ], 'clientOptions' => [ 'maxFileSize' => 2000000 ],
      'clientEvents' => [ 'fileuploaddone' => 'function(e, data) { console.log(e); console.log(data); }',
       'fileuploadfail' => 'function(e, data) { console.log(e); console.log(data); }', ], ]);
      ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
