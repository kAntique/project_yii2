<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-view">

    <h1><?= Html::encode('PSN-Qu-'.$this->title) ?></h1>

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

            'header' => '<h4>Quotation</h4>',
              'id' => 'modal',
                'size' => 'modal-lg',

              ]);
              echo "<div><b>เลขที่ใบเสนอราคา:</b> $model->id_doc_qu</div>";
                echo "<div id='modalContent'></div>";
              ?>
              <?php  Modal::end();?>
    </p>
    <div class="body">

      <body>

           <div class="header">
             <div class="row-xs-6">
               <div class="col-xs-12">
                 <h2 class="page-header " align='center'>
                   <i class="" ></i><b>Phoenix</b>soft
                 </h2>
               </div>
               <!-- /.col -->
             </div>
           </div>

            <!-- info row -->
            <div class="content">
              <div class="row">
                <div class="col-xs-12" >
                  <h4 align="left">รหัสเอกสารใบเสนอราคา : <?php echo $model->id_doc_qu;  ?></h4>
                  <?php foreach ($user as $key): ?>
                    <h4 align="left">ชื่อลูกค้า : <?php echo $key['name'];  ?></h4>
                  <?php endforeach; ?>

                  <h4 align="left">วันที่ออกใบเนอสินค้า : <?php echo $model->date ?></h4>
                  <h4 align="left">ระยะเวลาการทำงานทั้งหมด : <?php echo $model->dev_time ?></h4>
                  <h4 align="left">การรับประกันสินค้า : <?php echo $model->guaruantee ?></h4>
                  <h4 align="left">การจ่ายเงิน : <?php echo $model->payment ?></h4>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <h3 align="center">รายละเอียด</h3>
              <div class="row">
                <div class="col-xs-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Product Description</th>
                      <th>Quantity</th>
                      <th>Unit price</th>
                      <!--<th>Subtotal</th>-->
                    </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <tbody>
                      <?php  foreach($detail as $row):?>
                    <tr>

                      <td align='center'><?php echo $i; ?></td>
                      <td><?php echo $row['product_description']; ?></td>
                      <td align='center'><?php echo $row['quantity']; ?></td>
                      <td align='center'><?php echo $row['unit_price']; ?></td>

                    </tr>
                    <?php $i++; ?>
                    <?php endforeach;?>

                    </tbody>

                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- /.row -->

            </div>




      </body>


    </div>


     <!-- Html::button('ExportPDF',['value'=>Url::to('index.php?r=detail/detail/create'),'class'=> 'btn btn-success','id'=> 'modalButton'])  ?> -->
     <!--?= DetailView::widget([
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
     ]) ?-->
</div>
