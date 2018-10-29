<?php
require("config/func.php");
// starts session.
session_start();

if (isset($_POST['pendingRequest']) && !empty($_POST['pendingRequest'])) {

  $data = $_POST;
  $data['billingDate'] = date("Y-m-d H:i:s");
  $data['bankReference'] = 'T123123321321';
  $data['bankAuth'] = '321456';
  $data['currency'] = 'MYR';
  $amount = str_replace(',', '', number_format($_POST['amount'], 2));
  $amount = str_replace('.', '', $amount);

  print_r($data); die();

  $addStatus = addTransactions($data);

  // open response page.
  if ($addStatus['status']) {
    $data['paymentStatus'] = 'Success';
    $data['errorDesc'] = '';
    include('pages/responseSuccessPage.php');
  } else {
    $data['paymentStatus'] = 'Fail';
    $data['errorDesc'] = $addStatus['desc'];
    include('pages/responseFailPage.php');
  }

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
      die("Reference already paid");
    }

    $amount = str_replace(',', '', number_format($_POST['amount'], 2));
    $amount = str_replace('.', '', $amount);
    $data['signature'] = md5($amount.''.$_POST['merchantId'].''.$_POST['reference']);

    // open request page.
    include('pages/requestPage.php');
  }
}
