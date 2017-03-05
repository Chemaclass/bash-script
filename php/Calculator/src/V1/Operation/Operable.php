<?php declare(strict_types = 1);

namespace Calculator\V1\Operation;

interface Operable
{
    public function operate(float $value1, float $value2): float;
}