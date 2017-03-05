<?php declare(strict_types = 1);

namespace Tests;

use Calculator\V1\Calculator;
use Calculator\V1\Exceptions\NoOperatorError;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testFirstValueAsPositive()
    {
        $calculator = new Calculator();
        $calculator->push('2');
        $calculator->push('+3');
        $this->assertEquals(5, $calculator->result());
    }

    public function testWithoutConstructor()
    {
        $calculator = new Calculator();
        $calculator->push('+3');
        $calculator->push('+4');
        $this->assertEquals(7, $calculator->result());
    }

    public function testBasicSum()
    {
        $calculator = new Calculator('1');
        $calculator->push('+2');
        $this->assertEquals(3, $calculator->result());
    }

    public function testBasicMinus()
    {
        $calculator = new Calculator('5');
        $calculator->push('-7');
        $this->assertEquals(-2, $calculator->result());
    }

    public function testBasicMulti()
    {
        $calculator = new Calculator('2');
        $calculator->push('*3');
        $this->assertEquals(6, $calculator->result());
    }

    public function testBasicDiv()
    {
        $calculator = new Calculator('8');
        $calculator->push('/2');
        $this->assertEquals(4, $calculator->result());
    }

    public function testErrorIfNoOperatorNotInitValueFromConstructor()
    {
        $this->expectException(NoOperatorError::class);
        $calculator = new Calculator();
        $calculator->push('1');
        $calculator->push('2');
    }

    public function testErrorIfNoOperatorInitValueFromConstructor()
    {
        $this->expectException(NoOperatorError::class);
        $calculator = new Calculator('1');
        $calculator->push('2');
    }

    public function testSumWith1Decimal()
    {
        $calculator = new Calculator('1.1');
        $calculator->push('+1.2');
        $this->assertEquals(2.3, $calculator->result());
    }

    public function testMinusWith2Decimal()
    {
        $calculator = new Calculator('8.67');
        $calculator->push('-2.23');
        $this->assertEquals(6.44, $calculator->result());
    }

    public function testMultiWith3Decimal()
    {
        $calculator = new Calculator('2.123');
        $calculator->push('*7.234');
        $this->assertEquals(15.357782, $calculator->result());
    }

    public function testDivWith4Decimal()
    {
        $calculator = new Calculator('16.7865');
        $calculator->push('/22.4387');
        $this->assertEquals(0.74810483673, $calculator->result());
    }

    public function testIgnoreCharsAfter2DotsInConstructor()
    {
        $calculator = new Calculator('1.23.4');
        $calculator->push('+1.234');
        $this->assertEquals(2.464, $calculator->result());
    }

    public function testIgnoreCharsAfter2DotsInPush()
    {
        $calculator = new Calculator('1.234');
        $calculator->push('+1.2.3.4');
        $this->assertEquals(2.434, $calculator->result());
    }

    public function testMultiplePush()
    {
        $calculator = (new Calculator('1'))
            ->push('+2')
            ->push('*3')
            ->push('-4');
        $this->assertEquals(5, $calculator->result());
    }
}

