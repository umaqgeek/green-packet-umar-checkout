<?php
require("dbconnect.php");

function isValidMerchant($merchantId) {
  $status = false;

  $sql = sprintf("SELECT m.m_id FROM merchants m WHERE MD5(CONCAT(m.m_id, m.m_salt)) = '%s'", $merchantId);
  echo $sql;

  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}
