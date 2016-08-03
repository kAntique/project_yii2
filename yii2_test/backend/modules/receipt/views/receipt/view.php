<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal ;
use yii\helpers\Url;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model backend\modules\receipt\models\Receipt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

          <?= Html::button('เพิ่มรายละเอียด',['value'=> Url::to('index.php?r=detail/detail/create'),'class'=> 'btn btn-success','id'=> 'modalButton'])  ?>
            <?php Modal::begin([

                'header' => '<h4>Receipt</h4>',
                  'id' => 'modal',
                    'size' => 'modal-lg',


                  ]);
                  echo "<div><b>เลขที่ใบเสร็จ:</b> $model->id_doc_re</div>";
                    echo "<div id='modalContent'></div>";



                    Modal::end();?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_company',
            'id_customer',
            'date',
            'id_doc_re',
        ],
    ]) ?>

</div>
