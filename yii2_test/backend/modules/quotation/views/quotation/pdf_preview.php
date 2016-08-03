<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\helpers\ArrayHelper;
  use yii\widgets\DetailView;
  use yii\db\ActiveQuery;
  use backend\modules\quotation\models\Detail;
?>
<div class="_preview">
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header " align='center'>
            <?=Html::img(Yii::getAlias('@backend').'/web/uploads/logocompany_img1675.jpg', ['width' => 120])?>
            <i class="fa fa-globe" ></i><b>Phoenix</b>soft

          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        <div class="col-xs-5">
          Date# <?php echo $model->date;?>
          <address>
            <strong><h2>QUOTATION</h2></strong><br>
             &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;NO : <?php echo $model->id_doc_qu ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          ISSUED TO:
          <address>
            <strong><?php echo 'name'; ?></strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
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

            <tbody>

            <tr>

            </tr>

            </tbody>

          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-7">
          <p class="lead"><b>Terms and Condition:</b></p>
          <p>
            <b>Development Time : </b><?php echo $model->dev_time ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-3">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:80%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax/Vat</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$5.80</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-7">

              <b>Payment :</b><?php echo $model->payment ?>
              <p>
                <b>Guarantee :</b><?php echo $model->guaruantee ?>
              </p>
              <p>
                <b>Bank info : </b><?php echo $model->guaruantee ?>
              </p>
              <P bgcolor='gree'>
                <b class="success"><i>Thank you for giving us the opportunity to server you..</i></b>
              </P>

        </div>
        <div class="col-xs-3">
            <p align="center">
              General Manager
              <?=Html::img(Yii::getAlias('@backend').'/web/uploads/signaturecompany_img6981.jpg', ['width' => 100])?>
            </p>
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  </body>
  </html>

</div>
