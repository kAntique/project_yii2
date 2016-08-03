<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */

$this->title = 'Update Quotation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]];
$this->params['breadcrumbs'][] = 'Update';
$q = $model->id;
?>
<div class="quotation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'q' => $q,
    ]) ?>

</div>
