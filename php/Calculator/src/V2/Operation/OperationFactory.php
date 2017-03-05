<?php declare(strict_types = 1);

namespace Calculator\V2\Operation;

final class OperationFactory
{
    private static $map = [
        '+' => SumOperation::class,
        '-' => MinOperation::class,
        '*' => MulOperation::class,
        '/' => DivOperation::class,
    ];

    public static function forOperator(string $operator): Operator
    {
        if (!isset(static::$map[$operator])) {
            throw new \Exception("Operator $operator not found!");
        }

        return new static::$map[$operator];
    }
}