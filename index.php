<?php
session_start();

$data = $_POST;

$allowedParams = [
  ['amount', true],
  ['merchantId', true],
  ['reference', true],
  ['remark', false]
];

$errStatus = false;
if (!empty($data)) {
  foreach ($data as $key => $val) {
    foreach ($allowedParams as $d) {
      if ($key != $d[0]) {
        $errStats = true;
        break;
      }
      if ($d[1] === true && empty($val)) {
        $errStats = true;
        break;
      }
    }
    if ($errStats) break;
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
