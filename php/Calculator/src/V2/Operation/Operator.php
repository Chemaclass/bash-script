<?php declare(strict_types = 1);

namespace Calculator\V2\Operation;

interface Operator
{
    public function operate(float $value1, float $value2): float;
}