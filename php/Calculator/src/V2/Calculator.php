<?php declare(strict_types = 1);

namespace Calculator\V2;

use Calculator\V2\Operation\OperationFactory;
use Calculator\V2\Operation\Operator;

final class Calculator
{
    const ALLOW_OPERATORS = [
        '+',
        '-',
        '*',
        '/',
    ];

    /** @var string */
    private $bufferValue = '';

    /** @var string */
    private $currentValue = '';

    /** @var Operator|null */
    private $lastOperator = null;

    public function __construct(
        string $value1 = '',
        string $value2 = '',
        Operator $operator = null
    ) {
        $this->bufferValue = $this->cleanInput($value1);
        $this->currentValue = $this->cleanInput($value2);
        $this->lastOperator = $operator;
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
        if (empty($this->lastOperator)) {
            return $this->calculateForOperator($input, $this->currentValue);
        }

        return $this->calculateForOperator(
            $input,
            (string)$this
                ->lastOperator
                ->operate(
                    floatval($this->bufferValue),
                    floatval($this->currentValue)
                )
        );
    }

    private function calculateForOperator(string $operator, string $value)
    {
        return new self(
            $value,
            '',
            OperationFactory::forOperator($operator)
        );
    }

    private function forValue(string $input): self
    {
        // 3rd case, increment the currentValue
        if (empty($this->lastOperator)) {
            return new self($this->bufferValue, $this->currentValue . $input);
        }

        $this->currentValue .= $input;
        // 4th case, do the operation (buffer & newValue)
        return new self($this->bufferValue, $this->currentValue, $this->lastOperator);
    }

    public function result(): float
    {
        if (empty($this->lastOperator)) {
            return floatval($this->currentValue);
        }

        return $this->lastOperator
            ->operate(floatval($this->bufferValue), floatval($this->currentValue));
    }
}
