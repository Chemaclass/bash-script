<?php declare(strict_types=1);

namespace Tests\V2;

use Calculator\V2\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function onlyOneInput()
    {
        $calculator = (new Calculator())
            ->push('2');
        $this->assertEquals(2, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndSumOperator()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('3')
            ->push('+');
        $this->assertEquals(3, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndMinOperator()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('3')
            ->push('-');
        $this->assertEquals(3, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndMulOperator()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('3')
            ->push('*');
        $this->assertEquals(0, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndDivOperator()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('3')
            ->push('/');
        $this->assertEquals(0, $calculator->result());
    }

    /**
     * @test
     */
    public function basicSum()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('20.111')
            ->push('+')
            ->push('30.222');
        $this->assertEquals(50.333, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMin()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('20.105')
            ->push('-')
            ->push('30.205');
        $this->assertEquals(-10.1, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMul()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('20')
            ->push('*')
            ->push('30');
        $this->assertEquals(600, $calculator->result());
    }

    /**
     * @test
     */
    public function basicDiv()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('50')
            ->push('/')
            ->push('10');
        $this->assertEquals(5, $calculator->result());
    }

    /**
     * @test
     */
    public function basicSumWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('1')
            ->push('.')
            ->push('1')
            ->push('3')
            ->push('+')
            ->push('2')
            ->push('2')
            ->push('.')
            ->push('2')
            ->push('2');
        $this->assertEquals(23.35, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMinWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('1')
            ->push('0')
            ->push('-')
            ->push('3')
            ->push('0')
            ->push('.')
            ->push('5');
        $this->assertEquals(-20.5, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMulWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('1')
            ->push('0')
            ->push('.')
            ->push('5')
            ->push('*')
            ->push('2')
            ->push('0');
        $this->assertEquals(210, $calculator->result());
    }

    /**
     * @test
     */
    public function basicDivWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('1')
            ->push('0')
            ->push('0')
            ->push('/')
            ->push('2')
            ->push('0');
        $this->assertEquals(5, $calculator->result());
    }

    /**
     * @test
     */
    public function operateSumAndMin()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('2.2')
            ->push('+')
            ->push('3.3')
            ->push('-')
            ->push('1.1');
        $this->assertEquals(4.4, $calculator->result());
    }

    /**
     * @test
     */
    public function operateSumAndMul()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('2.2')
            ->push('+')
            ->push('3.3')
            ->push('*')
            ->push('2');
        $this->assertEquals(11, $calculator->result());
    }

    /**
     * @test
     */
    public function operateMulAndSumAndMul()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('2')
            ->push('*')
            ->push('2')
            ->push('+')
            ->push('3')
            ->push('*')
            ->push('2');
        $this->assertEquals(14, $calculator->result());
    }

    /**
     * @test
     */
    public function takeOnlyFirstDotDecimalAndIgnoreTheRest()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('1')
            ->push('.')
            ->push('1')
            ->push('.')
            ->push('9')
            ->push('.')
            ->push('9')
            ->push('+')
            ->push('2')
            ->push('.')
            ->push('1')
            ->push('.')
            ->push('9')
            ->push('+')
            ->push('3')
            ->push('.')
            ->push('1')
            ->push('.')
            ->push('9');
        $this->assertEquals(6.3, $calculator->result());
    }

    /**
     * @test
     */
    public function sumNegativeNumbersWithDecimals()
    {
        /** @var Calculator $calculator */
        $calculator = (new Calculator())
            ->push('-')
            ->push('2')
            ->push('.')
            ->push('5')
            ->push('+')
            ->push('-')
            ->push('3')
            ->push('.')
            ->push('5');
        $this->assertEquals(-6, $calculator->result());
    }
}

