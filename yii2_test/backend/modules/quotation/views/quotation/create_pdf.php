<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal ;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_doc_qu',
            'id_company',
            'id_customer',
            'date',
            'dev_time',
            'payment:ntext',
            'guaruantee',
        ],
    ]) ?>

  <p>
      <!--?= Html::button('ExportFilePDF',['class'=> 'btn btn-success','id'=> 'pdfButton'])  ?-->
      <?php Modal::begin([

          'header' => '<h4>Quotation</h4>',
          'toggleButton' => ['label' => 'ExportFilePDF'],
            //'id' => 'pdfmodal',
              //'size' => 'modal-lg',


            ]);

            echo \yii2assets\pdfjs\PdfJs::widget([
              'url' => Url::base().'/downloads/calendar_all.pdf'
            ]);




              Modal::end();?>
        </p>




</div>
