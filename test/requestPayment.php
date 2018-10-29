<?php
use PHPUnit\Framework\TestCase;

class RequestPayment extends TestCase {
	public function testCalculationOfMax() {
    $numbers = array(5, 2, 10, 11, 7, 9);
    $expectedResult = 11;
		$this->assertEquals($expectedResult, max($numbers));
	}
}
