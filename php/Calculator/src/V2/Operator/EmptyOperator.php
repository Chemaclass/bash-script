<?php declare(strict_types = 1);

namespace Calculator\V2\Operator;

final class EmptyOperator extends Operator
{
    public function operate(float $value1, float $value2): float
    {
        throw new EmptyOperatorError;
    }
}