<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-6" align="left" >
        <?php  foreach($company as $key):?>
            <?php echo $key['address'] ?><br/>
        <?php endforeach;?>
      </div>
      <div class="col-xs-4" align="left">
        <?php  foreach($company as $key):?>
          <?php echo $key['phone_number'] ?>&nbsp;&nbsp;&nbsp;
          <?php echo $key['website'] ?>
          <?php echo $key['email'] ?>
          <?php echo $key['tax'] ?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</div>
