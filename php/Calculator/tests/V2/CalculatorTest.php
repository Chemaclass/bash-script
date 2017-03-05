<?php declare(strict_types = 1);

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
        $calculator = Calculator::factory();
        $calculator = $calculator->push('2');
        $this->assertEquals(2, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndSumOperator()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('+');
        $this->assertEquals(3, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndMinOperator()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('-');
        $this->assertEquals(3, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndMulOperator()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('*');
        $this->assertEquals(0, $calculator->result());
    }

    /**
     * @test
     */
    public function onlyOneInputAndDivOperator()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('/');
        $this->assertEquals(0, $calculator->result());
    }

    /**
     * @test
     */
    public function basicSum()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('20.111');
        $calculator = $calculator->push('+');
        $calculator = $calculator->push('30.222');
        $this->assertEquals(50.333, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMin()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('20.105');
        $calculator = $calculator->push('-');
        $calculator = $calculator->push('30.205');
        $this->assertEquals(-10.1, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMul()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('20');
        $calculator = $calculator->push('*');
        $calculator = $calculator->push('30');
        $this->assertEquals(600, $calculator->result());
    }

    /**
     * @test
     */
    public function basicDiv()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('50');
        $calculator = $calculator->push('/');
        $calculator = $calculator->push('10');
        $this->assertEquals(5, $calculator->result());
    }

    /**
     * @test
     */
    public function basicSumWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('1');
        $calculator = $calculator->push('.');
        $calculator = $calculator->push('1');
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('+');
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('.');
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('2');
        $this->assertEquals(23.35, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMinWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('1');
        $calculator = $calculator->push('0');
        $calculator = $calculator->push('-');
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('0');
        $calculator = $calculator->push('.');
        $calculator = $calculator->push('5');
        $this->assertEquals(-20.5, $calculator->result());
    }

    /**
     * @test
     */
    public function basicMulWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('1');
        $calculator = $calculator->push('0');
        $calculator = $calculator->push('.');
        $calculator = $calculator->push('5');
        $calculator = $calculator->push('*');
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('0');
        $this->assertEquals(210, $calculator->result());
    }

    /**
     * @test
     */
    public function basicDivWithIndependentDigits()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('1');
        $calculator = $calculator->push('0');
        $calculator = $calculator->push('0');
        $calculator = $calculator->push('/');
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('0');
        $this->assertEquals(5, $calculator->result());
    }

    /**
     * @test
     */
    public function operateSumAndMin()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('2.2');
        $calculator = $calculator->push('+');
        $calculator = $calculator->push('3.3');
        $calculator = $calculator->push('-');
        $calculator = $calculator->push('1.1');
        $this->assertEquals(4.4, $calculator->result());
    }

    /**
     * @test
     */
    public function operateSumAndMul()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('2.2');
        $calculator = $calculator->push('+');
        $calculator = $calculator->push('3.3');
        $calculator = $calculator->push('*');
        $calculator = $calculator->push('2');
        $this->assertEquals(11, $calculator->result());
    }

    /**
     * @test
     */
    public function operateMulAndSumAndMul()
    {
        /** @var Calculator $calculator */
        $calculator = Calculator::factory();
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('*');
        $calculator = $calculator->push('2');
        $calculator = $calculator->push('+');
        $calculator = $calculator->push('3');
        $calculator = $calculator->push('*');
        $calculator = $calculator->push('2');
        $this->assertEquals(14, $calculator->result());
    }
}

