<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\helpers\ArrayHelper;
  use yii\widgets\DetailView;
  use yii\db\ActiveQuery;
  use kartik\icons\Icon;
  use app\assets\MyAsset;

  //Icon::map($this);
?>
<!-- <div class="_preview"> -->
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title > &nbsp;&nbsp;</title>
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
  <body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
     <div class="header">
       <div class="row-xs-6">
         <div class="col-xs-12">
           <h2 class="page-header " align='center'>
             <i class="fa fa-globe" ></i><b>Phoenix</b>soft
           </h2>
         </div>
         <!-- /.col -->
       </div>
     </div>

      <!-- info row -->
      <div class="content">
        <div class="row">
          <div class="col-xs-5">
            Date# <?php echo $model->date;?>
            <address >
              <p ><h2 >QUOTATION</h2>
               &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;NO : <?php echo $model->id_doc_qu ?>
              </p>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-xs-5">
            <b>ISSUED TO:</b>
            <address>
              <!--<strong> -->

                <?php  foreach($user as $key):?>
                  <b font color="green"><?php echo $key['name'] ?></b><br />
                  <?php echo $key['address'] ?><br/>
                  <?php echo $key['phone_number'] ?><br/>
                  <?php echo $key['email'] ?>
                <?php endforeach;?>
              <!--</strong> --><br>

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
                <?php  foreach($query as $row):?>
              <tr>

                <td align='center'><?php echo $row['id']; ?></td>
                <td><?php echo $row['product_description']; ?></td>
                <td align='center'><?php echo $row['quantity']; ?></td>
                <td align='center'><?php echo $row['unit_price']; ?></td>

              </tr>
              <?php endforeach;?>
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
              <b>&nbsp;&nbsp;&nbsp;&nbsp;Development Time : </b><?php echo $model->dev_time ?>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-xs-3">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:70%">Subtotal:</th>
                  <td>Baht&nbsp;<?php echo $add ?></td>
                </tr>
                <tr>
                  <th>Tax/Vat</th>
                  <td>-</td>
                </tr>
                <tr>
                  <th font color="green">Total:</th>
                  <td font color="green">Baht&nbsp;<?php echo $add ?></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div><br/>
        <!-- /.row -->
        <div class="row">
          <div class="col-xs-7">

                <P><b>&nbsp;&nbsp;&nbsp;&nbsp;Payment : </b>

                  <?php echo $model->payment ?>
                </P>
                <p>
                  <b>&nbsp;&nbsp;&nbsp;&nbsp;Guarantee :</b>&nbsp;&nbsp;<?php echo $model->guaruantee ?>
                </p>
                <p>
                  <?php  foreach($company as $key):?>
                  <b>&nbsp;&nbsp;&nbsp;&nbsp;Back info : &nbsp;&nbsp;<?php echo $key['bank_info'] ?></b>
                  <?php endforeach;?>
                </p>
                <P font color="green">
                  <b><i>Thank you for giving us the opportunity to server you..</i></b>
                </P>

          </div>
          <div class="col-xs-3">
              <p align="center">
                General Manager
              </p><br/>
              <p align="center">
                ...Stamp...
              </p><br/>
              <p align="center">
                ...Signature...
              </p><br/>
              <p align="center">
                Signature & Stamp
              </p>
          </div>

        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->

  </body>

  </html>

<!-- </div> -->
