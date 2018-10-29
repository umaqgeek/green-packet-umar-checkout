<?php include("header.php"); ?>

<div class="col-sm-12">
  <span class=""></span> <strong>Summary of Payment</strong>
  <hr />
</div>
<div class="col-sm-4"><strong>Status</strong></div>
<div class="col-sm-8"><strong class="total"><?=$data['paymentStatus']; ?></strong></div>
<div class="col-sm-4"><strong>Billing Date</strong></div>
<div class="col-sm-8"><?=$data['billingDate']; ?></div>
<div class="col-sm-4"><strong>Bank Transaction No.</strong></div>
<div class="col-sm-8"><?=$data['bankReference']; ?></div>
<div class="col-sm-4"><strong>Reference No.</strong></div>
<div class="col-sm-8"><?=$data['reference']; ?></div>

<div class="col-sm-12">
  <hr />
  <h3>Thank you for your business.</h3>

  <p>The card with this number in
    <strong><?=$data['credit-card-no']; ?></strong> has been successfully charged <strong><?=$data['currency']; ?> <?=$data['amount']; ?></strong> . A copy of this receipt is also in your transaction history.</p>
  <p>If you have any questions, please let us know. We'll get back to you as soon as we can.</p>
  <a href="!#">support@greenpacket.net</a>
</div>

<div class="col-sm-12">
  <hr />
  <strong>Credit-Card Information</strong>
  <ul>
    <li><?=$data['name']; ?></li>
    <li><?=$data['credit-card-no']; ?></li>
    <li><?=$data['banks']; ?></li>
  </ul>
</div>

<div class="col-sm-12">
  <hr />
  <strong>Total :</strong>
  <strong class="total"><?=$data['currency']; ?> <?=$data['amount']; ?></strong>
</div>

<div class="col-sm-12">
  <hr />
  <p>
    <strong>You are all set.</strong> Your card has been charged, and no further action is required on your part.
  </p>
  <a class="btn btn-success" style="width: 100%;" href="#!">Back to Merchant</a>
  <button class="btn btn-info" style="width: 100%;" href="#!" type="button" onclick="window.print();">Print</button>
</div>

<?php include("footer.php"); ?>
