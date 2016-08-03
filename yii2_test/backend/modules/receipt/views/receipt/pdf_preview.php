<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal ;
use kartik\mpdf\Pdf;
use kartik\grid\GridView;
use Rundiz\Number;
/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */

$this->title = $model->id;
?>

<div class="pdf_preview">

  <body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->

        <div class="col-xs-12">
          <table style="width:100%">
            <tr>
              <td class="page-header " align='center'><?=Html::img(Yii::getAlias('@backend').'/web/uploads/logocompany_img1675.jpg', ['width' => 120])?></td>

            </tr>
          </table>

        </div>

    <div class="row">
      <div class="col-xs-5">
        Date# <?php echo $model->date;?>
        <address >
          <p ><h2 >Receipt</h2>
           &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;NO : <?php echo $model->id_doc_re ?>
          </p>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-xs-5">
        <address>
          <!--<strong> -->

          <?php foreach ($data_customer as $show) : ?>
            <h3 >ลูกค้า</h3>
          <b>name</b>&nbsp;<?php echo $show['name'];?><br>
          <b>address</b>&nbsp;<?php echo $show['address'];?><br>
          <b>tel</b>&nbsp;<?php echo $show['phone_number'];?>
          <b>e-mail</b>&nbsp;<?php echo $show['email'];?>
          <b>website</b>&nbsp;<?php echo $show['website'];?><br>
          <b>bank_info</b>&nbsp;<?php echo $show['bank_info'];?><br>
          <b>tax</b>&nbsp;<?php echo $show['tax'];?><br>
        <?php endforeach;?><br>
          <!--</strong> --><br>

        </address>
      </div>
      <!-- /.col -->
    </div>
      <!-- Table row -->
      <div class="row" >
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Product Description</th>
              <th>Quantity</th>
              <th>Unit price</th>
              <th>Total price</th>
            </tr>
            </thead>
            <?php $i=1;?>
            <tbody>

                <?php foreach ($data_detail as $show) : ?>

            <tr>

              <td><?php echo $i;?></td>
              <td><?php echo $show['product_description'];?></td>
              <td><?php echo $show['quantity'];?></td>
              <td><?php echo $show['unit_price'];?></td>
              <td><?php $total_price = $show['quantity']*$show['unit_price'];?>
                  <?php echo $total_price;?></td>
            </tr>
            <?php $i++ ;?>
            <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div >
        <td>
          <?php $number2W = new \Rundiz\Number\Number();?>
        <br>จำนวนเงิน(ตัวอักษร).....<?php echo $number2W->convertBaht($total, true, 'Thai') ;?>.....
      </td>

    </div>
      <table align="right">
      <tr>
        <td>
          <div  class="table-responsive" >

            <div >
              <tr>
                <th>Subtotal:</th>
                <td>฿&nbsp;<?php echo $total;?></td>
              </tr>
            </div>
            <tr>
              <th>Tax/vat (7%)</th>
              <td>-</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>฿&nbsp;<?php echo $total;?></td>
            </tr>
            <tr>
              <td >
                <br><br><p >General Manager</p>
              </td>
            </tr>
            <tr>
              <td>
                  <br><?=Html::img(Yii::getAlias('@backend').'/web/uploads/signaturecompany_img6981.jpg', ['width' => 100])?>
              </td>
            </tr>
            <tr>
              <td >
                <br><p >Signature &amp; Stamp</p>
              </td>
            </tr>
        </div>
      </td>
    </tr>
  </table>

    </section>

      <div class="col-xs-6 table-responsive">
        <table class="table table-striped" >
          <tr ><td>  <?php foreach ($data_company as $show) : ?>
            <br><b>bank_info</b>&nbsp;<?php echo $show['bank_info'];?><br>
           <?php endforeach;?><br></td> </tr>
          <tr><td >   Thankyou for giving us the opportunity to serve you...</td></tr>
          </table>

          </div>

  </div>
  <!-- ./wrapper -->
  </body>


</div>
