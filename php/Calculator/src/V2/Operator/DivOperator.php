<?php declare(strict_types = 1);

namespace Calculator\V2\Operator;

final class DivOperator extends Operator
{
    public function operate(float $value1, float $value2): float
    {
        if ($value2 <= 0) {
            return 0;
        }

        return $value1 / $value2;
    }
}