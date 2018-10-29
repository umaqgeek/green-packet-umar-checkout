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
       <div class="col-sm-2"><strong>Billing Date</strong></div>
       <div class="col-sm-10">{{billingDate}}</div>
       <div class="col-sm-2"><strong>Pay To</strong></div>
       <div class="col-sm-10"><?=$data['merchant']['m_email']; ?></div>
       <div class="col-sm-2"><strong>Reference ID</strong></div>
       <div class="col-sm-10"><?=$data['reference']; ?></div>

     </div>

     <script type='text/javascript' src="assets/js/script.js"></script>
     <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   </body>
</html>
