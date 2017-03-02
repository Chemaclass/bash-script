<?php declare(strict_types = 1);

namespace Calculator\Operation;

final class DivOperation implements Operable
{
    public function operate(float $value1, float $value2): float
    {
        return $value1 / $value2;
    }
}