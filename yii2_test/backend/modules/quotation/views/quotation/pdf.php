<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */

$this->title = 'Create PDF';
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pdf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('create_pdf', [
        'model' => $model,
          'id_doc'=> $id_doc,
    ]) ?>

</div>
