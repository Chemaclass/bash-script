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
        $this->buffer = floatval($this->sanitizedInput($initialInput));
    }

    private function sanitizedInput(string $initialInput): string
    {
        return $this->removeMoreThanOneDot(
            $this->removeNotAllowedChars($initialInput)
        );
    }

    private function removeMoreThanOneDot(string $input): string
    {
        if (false !== ($dotPos = strpos($input, '.'))) {
            $noDots = str_replace('.', '', $input);
            $input = substr($noDots, 0, $dotPos) . '.' . substr($noDots, $dotPos);
        }

        return $input;
    }

    private function removeNotAllowedChars(string $input): string
    {
        return preg_replace(
            sprintf('/[^0-9\,\.%s]/', implode('\\', self::ALLOW_OPERATORS)),
            '',
            $input
        );
    }

    public function push(string $input): Calculator
    {
        $this->buffer = (new Operation(
            $this->buffer,
            new Input($this->sanitizedInput($input)),
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