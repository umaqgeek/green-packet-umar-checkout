<?php
session_start();

$data = $_REQUEST;

$allowedParams = [
  {
    name: 'amount',
    required: true
  },
  {
    name: 'merchantId',
    required: true
  },
  {
    name: 'reference',
    required: true
  },
  {
    name: 'remark',
    required: false
  }
];

$errStatus = false;
foreach ($data as $key => $val) {
  foreach ($allowedParams as $d) {
    if ($key != $d->name) {
      $errStats = true;
      break;
    }
    if ($d->required && empty($val)) {
      $errStats = true;
      break;
    }
  }
  if ($errStats) break;
}

unset($_SESSION['errMsg']);
if ($errStats) {
  $_SESSION['errMsg'] = $errStats;
}

header("Location: index.php");

?>
