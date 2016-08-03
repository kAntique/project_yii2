<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\company\models\Company;
use backend\modules\customer\models\Customer;
use backend\modules\quotation\models\Quotation;
use backend\modules\detail\views\detail;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\bootstrap\ButtonGroup;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\data\Sort;
use yii\db\ActiveRecord;
use yii\grid\GridView;
use kartik\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */
/* @var $form yii\widgets\ActiveForm */

?>
<?php
//$getId =  $this->actionGetId();
 //$p = $q;
 //$this->title = $model->id;
 //echo $this->title;

//print_r($q);
//echo $q;
 //explode(',',$this->$q);
 //echo $model->id;
 // $getId = $array(
 //                  'qq' => $q, );
 // echo $getId['qq'];

?>


<div class="quotation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_doc_qu')->textInput(['readonly' => true, 'value' => 'PNS-Qu-'.$q]) ?>

    <?= Html::activeDropDownList($model, 'id_company',
      ArrayHelper::map(Company::find()->all(), 'id', 'name')) ?>

    <?= Html::activeDropDownList($model, 'id_customer',
        ArrayHelper::map(Customer::find()->all(), 'id', 'name')) ?>

    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
    ]);?>

    <?= $form->field($model, 'dev_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'guaruantee')->textInput(['maxlength' => true]) ?>



      <!-- ['label' => 'Company', 'icon' => 'glyphicon glyphicon-briefcase', 'url' => ['/detail/detail']], -->




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
