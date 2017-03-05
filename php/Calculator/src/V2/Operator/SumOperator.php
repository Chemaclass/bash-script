<?php declare(strict_types = 1);

namespace Calculator\V2\Operator;

final class SumOperator extends Operator
{
    public function operate(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }
}