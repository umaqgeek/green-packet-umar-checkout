<?php
require("dbconnect.php");

function isValidMerchant($merchantId) {
  $sql = sprintf("SELECT m.m_id FROM merchants m WHERE MD5(CONCAT(m.m_id, m.m_salt)) = '%s'", $merchantId);
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}

function isReferenceExist($refId) {
  $sql = sprintf("SELECT tr.tr_id FROM transactions tr WHERE tr.tr_reference = '%s' AND tr.tr_status = 'Success'", $refId);
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}

function getMerchant($merchantId) {
  $sql = sprintf("SELECT m.m_email FROM merchants m WHERE MD5(CONCAT(m.m_id, m.m_salt)) = '%s'", $merchantId);
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return $row;
    }
  } else {
    return null;
  }
}
