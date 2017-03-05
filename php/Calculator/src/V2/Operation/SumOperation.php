<?php declare(strict_types = 1);

namespace Calculator\V2\Operation;

final class SumOperation implements Operator
{
    public function operate(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }
}