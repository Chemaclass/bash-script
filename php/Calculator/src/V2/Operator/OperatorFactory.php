<?php declare(strict_types = 1);

namespace Calculator\V2\Operator;

final class OperatorFactory
{
    private static $map = [
        '+' => SumOperator::class,
        '-' => MinOperator::class,
        '*' => MulOperator::class,
        '/' => DivOperator::class,
    ];

    public static function forOperator(string $operator): Operator
    {
        if (!isset(static::$map[$operator])) {
            throw new \Exception("Operator $operator not found!");
        }

        return new static::$map[$operator];
    }

    public static function anEmpty()
    {
        return new EmptyOperator();
    }
}