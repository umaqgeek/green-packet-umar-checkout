<?php

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
  }
  if ($errStats) break;
}

if ($errStats) {
  header('location:javascript://history.go(-1)');
}

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, 'index.php');
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

?>
