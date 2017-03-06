<?php declare(strict_types = 1);

namespace Calculator\V2;

use Calculator\V2\Operator\EmptyOperator;
use Calculator\V2\Operator\OperatorFactory;
use Calculator\V2\Operator\Operator;

final class Calculator
{
    const ALLOW_OPERATORS = [
        '+',
        '-',
        '*',
        '/',
    ];

    /** @var string */
    private $bufferValue;

    /** @var string */
    private $currentValue;

    /** @var Operator */
    private $lastOperator;

    public function __construct(
        string $value1 = '',
        string $value2 = '',
        Operator $operator = null
    ) {
        $this->bufferValue = $this->cleanInput($value1);
        $this->currentValue = $this->cleanInput($value2);
        $this->lastOperator = empty($operator)
            ? OperatorFactory::anEmpty()
            : $operator;
    }

    private function cleanInput(string $input): string
    {
        return preg_replace(
            sprintf('/[^0-9\.%s]/', implode('\\', self::ALLOW_OPERATORS)),
            '',
            $input
        );
    }

    public function push(string $rawInput): self
    {
        $input = $this->cleanInput($rawInput);

        if ($this->isOperatorSign($input)) {
            return $this->forOperator($input);
        }

        return $this->forValue($input);
    }

    private function isOperatorSign(string $cleanInput): bool
    {
        return in_array($cleanInput, self::ALLOW_OPERATORS);
    }

    private function forOperator(string $input): self
    {
        if ($this->isLastOperatorEmpty()) {
            return Calculator::makeWithOperator($input, $this->currentValue);
        }

        return Calculator::makeWithOperator(
            $input,
            (string)$this
                ->lastOperator
                ->operate(
                    floatval($this->bufferValue),
                    floatval($this->currentValue)
                )
        );
    }

    private function isLastOperatorEmpty(): bool
    {
        return EmptyOperator::class === $this->lastOperator->name();
    }

    private function makeWithOperator(string $operator, string $bufferValue)
    {
        return new self(
            $bufferValue,
            '',
            OperatorFactory::forOperator($operator)
        );
    }

    private function forValue(string $input): self
    {
        return new self(
            $this->bufferValue,
            $this->currentValue . $input,
            $this->isLastOperatorEmpty()
                ? OperatorFactory::anEmpty()
                : $this->lastOperator
        );
    }

    public function result(): float
    {
        if ($this->isLastOperatorEmpty()) {
            return floatval($this->currentValue);
        }

        return $this->lastOperator
            ->operate(floatval($this->bufferValue), floatval($this->currentValue));
    }
}
