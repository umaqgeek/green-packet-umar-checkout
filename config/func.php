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
  $sql = sprintf("SELECT m.m_id, m.m_email FROM merchants m WHERE MD5(CONCAT(m.m_id, m.m_salt)) = '%s'", $merchantId);
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return $row;
    }
  } else {
    return null;
  }
}

function addTransactions($data) {
  $status = array(
    'status' => true,
    'desc' => ''
  );
  $amount = str_replace(',', '', number_format($data['amount'], 2));
  $amount = str_replace('.', '', $amount);
  $creditCardInfo = $data['credit-card-no'].'<br />'.$data['name'].'<br />'.$data['banks'];
  $merchant = getMerchant($data['merchantId']);
  if ($merchant !== null) {
    $sql = sprintf("INSERT INTO transactions(tr_datetime, m_id, tr_reference,
      tr_transaction_id, tr_auth_code, tr_credit_card_info, tr_payment_method,
      tr_amount, tr_currency, tr_discount, tr_prod_desc, tr_status,
      tr_error_desc) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
      '%s', '%s', '%s', '%s')",
      $data['billingDate'],
      $merchant['m_id'],
      $data['reference'],
      $data['bankReference'],
      $data['bankAuth'],
      $creditCardInfo,
      $data['paymentOption'],
      $amount,
      $data['currency'],
      "",
      "",
      $data['paymentStatus'],
      $data['errorDesc']
    );
    if ($GLOBALS['conn']->query($sql) === TRUE) {
      $status['status'] = true;
      $status['desc'] = '';
    } else {
      $status['status'] = false;
      if (strpos($GLOBALS['conn']->error, 'Duplicate entry') !== false)
      $status['desc'] = 'Reference already paid';
    }
  } else {
    $status['status'] = false;
    $status['desc'] = 'Invalid merchant Id';
  }
  return $status;
}
