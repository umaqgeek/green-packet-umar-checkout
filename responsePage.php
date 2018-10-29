<html>
 <head>
   <link href="assets/images/favicon.png" rel="icon">
   <script type="text/javascript" src="assets/js/jquery.min.js"></script>
   <script type='text/javascript' src="assets/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
 </head>
   <body>
     <div class="col-sm-8 col-sm-offset-2" style="margin-top: 2%; margin-bottom: 5%;">

       <div class="col-sm-12">
         <span class=""></span> <strong>Summary of Payment</strong>
         <hr />
       </div>
       <div class="col-sm-3"><strong>Status</strong></div>
       <div class="col-sm-9"><strong class="total"><?=$_POST['paymentStatus']; ?></strong></div>
       <div class="col-sm-3"><strong>Billing Date</strong></div>
       <div class="col-sm-9"><?=$_POST['billingDate']; ?></div>
       <div class="col-sm-3"><strong>Bank Transaction No.</strong></div>
       <div class="col-sm-9"><?=$_POST['bankReference']; ?></div>
       <div class="col-sm-3"><strong>Reference No.</strong></div>
       <div class="col-sm-9"><?=$_POST['reference']; ?></div>

       <div class="col-sm-12">
         <hr />
         <h3>Thank you for your business.</h3>

         <p>The card with this number in
           <strong><?=$_POST['credit-card-no']; ?></strong> has been successfully charged <strong><?=$_POST['currency']; ?> <?=$_POST['amount']; ?></strong> . A copy of this receipt is also in your transaction history.</p>
         <p>If you have any questions, please let us know. We'll get back to you as soon as we can.</p>
         <a href="!#">support@greenpacket.net</a>
       </div>

       <div class="col-sm-12">
         <hr />
         <strong>Credit-Card Information</strong>
         <ul>
           <li><?=$_POST['name']; ?></li>
           <li><?=$_POST['credit-card-no']; ?></li>
           <li><?=$_POST['banks']; ?></li>
         </ul>
       </div>

       <div class="col-sm-12">
         <hr />
         <strong>Total :</strong>
         <strong class="total"><?=$_POST['currency']; ?> <?=$_POST['amount']; ?></strong>
       </div>

       <div class="col-sm-12">
         <hr />
         <p>
           <strong>You are all set.</strong> Your card has been charged, and no further action is required on your part.
         </p>
         <a class="btn btn-success" style="width: 100%;" href="#!">Back to Merchant</a>
         <button class="btn btn-info" style="width: 100%;" href="#!" type="button" onclick="window.print();">Print</button>
       </div>

     </div>

     <script type='text/javascript' src="assets/js/script.js"></script>
     <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   </body>
</html>
