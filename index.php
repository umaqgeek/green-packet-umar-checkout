<?php
require("./func.php");
// starts session.
session_start();

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
  echo "Invalid request.";
} else {

  $data = $_POST;
  $data['amount'] = is_numeric($_POST['amount']) ? number_format($_POST['amount'], 2) : 0.00;
  $isValidMerchant = isValidMerchant($data['merchantId']);
  $data['isValidMerchant'] = $isValidMerchant;

  print_r($data);
  die();

  // open request page.
  include('requestPage.php');
}
