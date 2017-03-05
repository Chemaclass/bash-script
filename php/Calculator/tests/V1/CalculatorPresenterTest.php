<?php declare(strict_types = 1);

namespace Tests\V1;

use Calculator\V1\Calculator;
use Calculator\V1\CalculatorPresenter;
use PHPUnit\Framework\TestCase;

final class CalculatorPresenterTest extends TestCase
{
    public function testEmpty()
    {
        $presenter = new CalculatorPresenter(
            (new Calculator('1'))
                ->push('+2')
                ->push('*3')
                ->push('-4')
        );
        $this->assertEquals('((((1)+2)*3)-4)', $presenter->history());
    }
}