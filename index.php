<?php
require("func.php");
// starts session.
session_start();

if (isset($_POST['pendingRequest']) && !empty($_POST['pendingRequest'])) {

  print_r($_POST);

  // open response page.
  include('responsePage.php');

} else if (isset($_POST['timeOutRequest']) && !empty($_POST['timeOutRequest'])) {

  die("Transaction timeout");

} else {
  // only allow request params related.
  $allowedParams = array(
    array('amount', true),
    array('merchantId', true),
    array('reference', true)
  );

  // filter for the related request params.
  $errStats = false;
  if (!empty($_POST)) {
    foreach ($allowedParams as $val) {
      if (!array_key_exists($val[0], $_POST)) {
        $errStats = true;
        break;
      }
    }
  } else {
    $errStats = true;
  }

  // set error if there are invalid params.
  if ($errStats) {
    die("Invalid request");
  } else {

    $data = $_POST;
    $data['amount'] = is_numeric($_POST['amount']) && $_POST['amount'] > 0 ? number_format($_POST['amount'], 2) : 0.00;

    // validation for amount
    if ($_POST['amount'] <= 0) {
      die("Invalid amount");
    }

    // validation for merchant Id (combination of id and salt in merchant's table)
    if (isValidMerchant($_POST['merchantId']) == false) {
      die("Invalid merchant Id");
    }
    $data['merchant'] = getMerchant($_POST['merchantId']);

    // validation for reference
    if (isReferenceExist($_POST['reference'])) {
      die("Reference already success paid");
    }

    $amount = str_replace(',', '', number_format($_POST['amount'], 2));
    $amount = str_replace('.', '', $amount);
    $signData = $amount.''.$_POST['merchantId'].''.$_POST['reference'];
    echo $signData;
    $data['signature'] = md5($signData);

    // print_r($data); die();

    // open request page.
    include('requestPage.php');
  }
}
