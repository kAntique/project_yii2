<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\receipt\models\Receipt */

$this->title = 'Update Receipt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receipt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id_doc' => $id_doc,
    ]) ?>

</div>
