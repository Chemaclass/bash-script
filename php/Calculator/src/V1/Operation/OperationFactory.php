<?php declare(strict_types = 1);

namespace Calculator\V1\Operation;

use Calculator\V1\Operation;

final class OperationFactory
{
    public static function forOperator(string $operator): Operable
    {
        switch ($operator) {
            case Operation::SUM:
                return new SumOperation();
            case Operation::MIN:
                return new MinOperation();
            case Operation::MUL:
                return new MulOperation();
            case Operation::DIV:
                return new DivOperation();
        }
        return new EquOperation();
    }
}