<?php include("header.php"); ?>

<div class="col-sm-12">
  <span class=""></span> <strong>Summary of Payment</strong>
  <hr />
</div>
<div class="col-sm-3"><strong>Status</strong></div>
<div class="col-sm-9"><strong class="total"><?=$data['paymentStatus']; ?></strong></div>
<div class="col-sm-3"><strong>Billing Date</strong></div>
<div class="col-sm-9"><?=$data['billingDate']; ?></div>
<div class="col-sm-3"><strong>Bank Transaction No.</strong></div>
<div class="col-sm-9"><?=$data['bankReference']; ?></div>
<div class="col-sm-3"><strong>Reference No.</strong></div>
<div class="col-sm-9"><?=$data['reference']; ?></div>

<div class="col-sm-12">
  <hr />
  <h3>Sorry. We're unable to process your transaction.</h3>
  <strong><?=$data['errorDesc']; ?></strong>
  <p>If you have any questions, please let us know. We'll get back to you as soon as we can.</p>
  <a href="!#">support@greenpacket.net</a>
</div>

<div class="col-sm-12">
  <hr />
  <a class="btn btn-success" style="width: 100%;" href="#!">Back to Merchant</a>
  <button class="btn btn-info" style="width: 100%;" href="#!" type="button" onclick="window.print();">Print</button>
</div>

<?php include("footer.php"); ?>
