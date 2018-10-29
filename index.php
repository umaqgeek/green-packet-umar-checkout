<?php
session_start();

$data = $_POST;

$allowedParams = array(
  array('amount', true),
  array('merchantId', true),
  array('reference', true),
  array('remark', false)
);

$errStats = false;
if (!empty($data)) {
  foreach ($allowedParams as $val) {
    if (!array_key_exists($val[0], $data)) {
      $errStats = true;
      break;
    }
  }
} else {
  $errStats = true;
}

print_r($data);
echo "|".$errStats."|";
die();

unset($_SESSION['errMsg']);
if ($errStats) {
  $_SESSION['errMsg'] = $errStats;
}

header("Location: requestPage.php");

?>
