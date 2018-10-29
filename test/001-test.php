<?php
use PHPUnit\Framework\TestCase;
require('vendor/autoload.php');

class RequestPayment extends PHPUnit_Framework_TestCase {

	protected $client;

  protected function setUp() {
  	$this->client = new GuzzleHttp\Client([
    	'base_uri' => 'https://green-packet-umar-checkout.herokuapp.com'
    ]);
  }

	public function testPost_InvalidInput_Amount() {
  	$response = $this->client->post('/', [
			'form_params' => [
      	'amount' => 0,
				'merchantId' => 'f2e4aa62a1f79f1a43a1fcbb86e0ebf2',
				'reference' => 'T001'
      ]
    ]);

    $this->assertEquals(200, $response->getStatusCode());

		$response->getBody()->rewind();
    $data = $response->getBody()->getContents();
    $this->assertEquals('Invalid amount', $data);
  }

	public function testPost_InvalidInput_MerchantId() {
  	$response = $this->client->post('/', [
			'form_params' => [
      	'amount' => 32.99,
				'merchantId' => 'f2e4aa62a1f79f1a43a1fcbb86e0ebf3',
				'reference' => 'T001'
      ]
    ]);

    $this->assertEquals(200, $response->getStatusCode());

		$response->getBody()->rewind();
    $data = $response->getBody()->getContents();
    $this->assertEquals('Invalid merchant Id', $data);
  }

	public function testPost_validInput_addTransactions() {
		$amount = 32.99;
		$amountCent = str_replace(',', '', $amount);
		$amountCent = str_replace('.', '', $amount);
		$merchantId = 'f2e4aa62a1f79f1a43a1fcbb86e0ebf2';
		$randRefId = 'T'.rand(10000, 99999);
		$response = $this->client->post('/', [
			'form_params' => [
				'paymentOption' => 'credit-card',
		    'name' => 'Omar Mukhtar B Hambaran',
		    'credit-card-no' => '4283321412341234',
		    'cvc' => '999',
		    'month' => '10',
		    'year' => '2020',
		    'country' => 'MY',
		    'banks' => 'Maybank Berhad',
		    'cbxAuth' => 'on',
		    'amount' => $amount,
		    'merchantId' => $merchantId,
		    'reference' => $randRefId,
		    'signature' => md5($amountCent.''.$merchantId.''.$randRefId),
		    'pendingRequest' => 1,
		    'billingDate' => '2018-10-29 15:24:58',
		    'bankReference' => 'T123123321321',
		    'bankAuth' => '321456',
		    'currency' => 'MYR'
      ]
    ]);

		$this->assertEquals(200, $response->getStatusCode());
		$response->getBody()->rewind();
    $data = $response->getBody()->getContents();
		$loc = strpos($data, '<h3>Thank you for your business.</h3>');
		$this->assertEquals(true, $loc);
	}

	public function testPost_invalidInput_addTransactions() {
		$amount = 32.99;
		$amountCent = str_replace(',', '', $amount);
		$amountCent = str_replace('.', '', $amount);
		$merchantId = 'f2e4aa62a1f79f1a43a1fcbb86e0ebf2';
		$randRefId = 'T'.rand(10000, 99999);
		$response = $this->client->post('/', [
			'form_params' => [
				'paymentOption' => 'credit-card',
		    'name' => 'Omar Mukhtar B Hambaran',
		    'credit-card-no' => '4283321412341234',
		    'cvc' => '999',
		    'month' => '10',
		    'year' => '2020',
		    'country' => 'MY',
		    'banks' => 'Maybank Berhad',
		    'cbxAuth' => 'on',
		    'amount' => $amount,
		    'merchantId' => $merchantId,
		    'reference' => $randRefId,
		    'signature' => md5($amountCent.''.$merchantId.''.$randRefId),
		    'pendingRequest' => 1,
		    'billingDate' => '2018-10-29 15:24:58',
		    'bankReference' => 'T123123321321',
		    'bankAuth' => '321456',
		    'currency' => 'MYR'
      ]
    ]);

		$response = $this->client->post('/', [
			'form_params' => [
				'paymentOption' => 'credit-card',
		    'name' => 'Omar Mukhtar B Hambaran',
		    'credit-card-no' => '4283321412341234',
		    'cvc' => '999',
		    'month' => '10',
		    'year' => '2020',
		    'country' => 'MY',
		    'banks' => 'Maybank Berhad',
		    'cbxAuth' => 'on',
		    'amount' => $amount,
		    'merchantId' => $merchantId,
		    'reference' => $randRefId,
		    'signature' => md5($amountCent.''.$merchantId.''.$randRefId),
		    'pendingRequest' => 1,
		    'billingDate' => '2018-10-29 15:24:58',
		    'bankReference' => 'T123123321321',
		    'bankAuth' => '321456',
		    'currency' => 'MYR'
      ]
    ]);

		$this->assertEquals(200, $response->getStatusCode());
		$response->getBody()->rewind();
    $data = $response->getBody()->getContents();
		$loc = strpos($data, '<h3>Thank you for your business.</h3>');
		$this->assertEquals(false, $loc);
	}
}
