<?php declare(strict_types = 1);

namespace Calculator\V1\Exceptions;

use Calculator\V1\Calculator;

final class NoOperatorError extends \Exception
{
    public function __construct(string $input)
    {
        parent::__construct('No operator found as FIRST char in input: "' . $input . '"'
            . PHP_EOL
            . 'Allow operators: ' . json_encode(Calculator::ALLOW_OPERATORS, JSON_UNESCAPED_SLASHES));
    }
}