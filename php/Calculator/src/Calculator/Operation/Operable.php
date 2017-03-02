<?php declare(strict_types = 1);

namespace Calculator\Operation;

interface Operable
{
    public function operate(float $value1, float $value2): float;
}