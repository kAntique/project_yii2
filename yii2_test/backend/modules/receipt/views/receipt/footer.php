<table >
<div>
  <tr>  <td >
        <strong>บริษัท</strong>
          <?php foreach ($data_company as $show) : ?>
          &nbsp;<?php echo $show['name'];?><br>
          <b>เลขที่</b>&nbsp;<?php echo $show['address'];?><br>
          <b>โทร.</b>&nbsp;<?php echo $show['phone_number'];?>&nbsp;
          <b>email :</b>&nbsp;<?php echo $show['email'];?>
          <b>website</b>&nbsp;<?php echo $show['website'];?><br>
          <b>เลขที่เสียภาษี</b>&nbsp;<?php echo $show['tax'];?>
        <?php endforeach;?><br>

  </td></tr>
</div>
</table>
