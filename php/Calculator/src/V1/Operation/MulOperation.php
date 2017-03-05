<?php declare(strict_types = 1);

namespace Calculator\V1\Operation;

final class MulOperation implements Operable
{
    public function operate(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }
}