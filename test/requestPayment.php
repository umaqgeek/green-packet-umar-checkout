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

	public function testTest01() {
    $this->assertEquals('qwerty', 'qwerty');
	}

	public function testPost_InvalidInput_Amount() {
  	$response = $this->client->request('POST', '/', [
    	'form_params' => [
      	'amount' => 252.39,
				'merchantId' => 'f2e4aa62a1f79f1a43a1fcbb86e0ebf2',
				'reference' => 'T001'
      ]
    ]);

    $this->assertEquals(200, $response->getStatusCode());

    $data = json_decode($response->getBody(), true);

    $this->assertEquals('Invalid amount', $data);
  }
}
