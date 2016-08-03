<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\modules\detail\models\Detail */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::button('เพิ่มรายละเอียด',['value'=> Url::to('index.php?r=detail/detail/create'),'class'=> 'btn btn-success','id'=> 'modalButton'])  ?>
        <?php Modal::begin([

            'header' => '<h4>Quotation</h4>',
              'id' => 'modal',
                'size' => 'modal-lg',

              ]);
            // echo "<div><b>เลขที่ใบเสนอราคา:</b> $model->id_doc_qu</div>";
                echo "<div id='modalContent'></div>";
                Modal::end();?>
    </p>

    <?php Pjax::begin(['id' => 'detail']) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_description',
            'quantity',
            'unit_price',
            'quotation_id',
            'receipt_id',
        ],
    ]) ?>
  <?php Pjax::end() ?>






</div>
