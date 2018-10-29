<?php include("header.php"); ?>

<form method="post" action="index.php">

  <div class="col-sm-12">
    <span class=""></span> <strong>Summary of Transaction</strong>
    <hr />
  </div>
  <div class="col-sm-3"><strong>Net Charges</strong></div>
  <div class="col-sm-9">MYR <?=$data['amount']; ?></div>
  <div class="col-sm-3"><strong>Pay To</strong></div>
  <div class="col-sm-9"><?=$data['merchant']['m_email']; ?></div>
  <div class="col-sm-3"><strong>Reference ID</strong></div>
  <div class="col-sm-9"><?=$data['reference']; ?></div>

  <div class="col-sm-12"><hr /></div>

  <div class="col-sm-12">
    <span class=""></span> <strong>Payment Option</strong>
    <hr />
  </div>
  <div class="col-sm-12">
    <select class="form-control" name="paymentOption">
      <option value="credit-card">Credit Card</option>
      <option value="banks">Banks</option>
    </select>
  </div>

  <div class="col-sm-12"><hr /></div>

  <div class="col-sm-12">
    <span class=""></span> <strong>Credit Card Details</strong>
    <hr />
  </div>

  <div class="col-sm-12">
    <center class="alert-danger">Timeout: <span id="timeOut"></span></center>
    <br />
  </div>
  <div class="col-sm-2"><strong>Name</strong></div>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="name" placeholder="Card holder's name." required />
  </div>
  <div class="col-sm-2"><strong>Credit Card No.</strong></div>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="credit-card-no" placeholder="123456789123" required />
  </div>
  <div class="col-sm-2"><strong>CVC/CVV2</strong></div>
  <div class="col-sm-4">
    <input class="form-control" type="password" name="cvc" placeholder="xxx" required />
  </div>
  <div class="col-sm-2"><strong>Expiry Date</strong></div>
  <div class="col-sm-2">
    <select class="form-control" name="month" required>
      <option value="" disabled selected hidden>MM</option>
      <?php for ($i=1; $i<=12; $i++) { ?>
        <option value="<?=$i; ?>"><?=$i; ?></option>
      <?php } ?>
    </select>
 </div>
 <div class="col-sm-2">
    <select class="form-control" name="year" required>
      <option value="" disabled selected hidden>YYYY</option>
      <?php for ($i=date('Y')+10; $i>=date('Y')-5; $i--) { ?>
        <option value="<?=$i; ?>"><?=$i; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-sm-2"><strong>Issuing Country</strong></div>
  <div class="col-sm-10">
    <select class="form-control" name="country" required>
      <option value="MY">Malaysia</option>
    </select>
  </div>
  <div class="col-sm-2"><strong>Issuing Bank</strong></div>
  <div class="col-sm-10">
    <select class="form-control" name="banks" required>
      <option value="" disabled selected hidden>Issuing bank for the card holder</option>
      <option value="Bank Islam Berhad">Bank Islam</option>
      <option value="Maybank Berhad">Maybank</option>
    </select>
  </div>

  <div class="col-sm-12"><hr /></div>

  <div class="col-sm-12">
    <label id="lblAuth">
      <input type="checkbox" name="cbxAuth" id="cbxAuth" /> &nbsp; I authorize Green Packet to debit the above net charges from my credit card.
      <input type="hidden" name="amount" value="<?=$data['amount']; ?>" />
      <input type="hidden" name="merchantId" value="<?=$data['merchantId']; ?>" />
      <input type="hidden" name="reference" value="<?=$data['reference']; ?>" />
      <input type="hidden" name="signature" value="<?=$data['signature']; ?>" />
      <input type="hidden" name="pendingRequest" value="1" />
    </label>
  </div>
  <div class="col-sm-12">
    <button class="btn btn-success" type="submit" id="btnProceed">Proceed</button>
    <button class="btn btn-warning" type="button" id="btnCancel">Cancel</button>
  </div>

</form>
<form method="post" action="index.php" id="formTimeOut">
  <input type="hidden" name="timeOutRequest" value="1" />
</form>

<?php include("footer.php"); ?>
