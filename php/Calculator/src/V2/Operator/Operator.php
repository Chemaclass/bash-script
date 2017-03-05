<?php declare(strict_types = 1);

namespace Calculator\V2\Operator;

abstract class Operator
{
    public abstract function operate(float $value1, float $value2): float;

    public function name(): string
    {
        return static::class;
    }
}