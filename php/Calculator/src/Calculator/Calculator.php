<?php declare(strict_types = 1);

namespace Calculator;

final class Calculator
{
    const ALLOW_OPERATORS = [
        Operation::SUM,
        Operation::MIN,
        Operation::MUL,
        Operation::DIV,
    ];

    /** @var float */
    private $buffer = 0.0;

    /** @var array */
    private $history = [];

    public function __construct(string $initialInput = '0')
    {
        $this->buffer = floatval($this->removeNotAllowedChars($initialInput));
    }

    private function removeNotAllowedChars(string $input): string
    {
        return preg_replace(
            sprintf('/[^0-9\.%s]/', implode('\\', self::ALLOW_OPERATORS)),
            '',
            $input
        );
    }

    public function push(string $input): Calculator
    {
        $this->buffer = (new Operation(
            $this->buffer,
            new Input($this->removeNotAllowedChars($input)),
            self::ALLOW_OPERATORS
        ))->operate();

        return $this;
    }

    public function result(): float
    {
        return $this->buffer;
    }

    public function history(): array
    {
        return $this->history;
    }
}