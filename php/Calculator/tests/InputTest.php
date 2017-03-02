<?php declare(strict_types = 1);

use Calculator\Input;
use Calculator\Operation;
use PHPUnit\Framework\TestCase;

class InputTest extends TestCase
{
    public function testEmpty()
    {
        $input = new Input('');
        $this->assertEquals('', $input->operator());
        $this->assertEquals(0.0, $input->value());
    }

    public function testNoOperator()
    {
        $input = new Input('2');
        $this->assertEquals(Input::DEFAULT_OPERATOR, $input->operator());
        $this->assertEquals(2, $input->value());
    }

    public function testWithOperator()
    {
        $input = new Input('+3');
        $this->assertEquals(Operation::SUM, $input->operator());
        $this->assertEquals(3, $input->value());
    }
}

