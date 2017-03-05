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

    /** @var Operator */
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
        return $this->removeNotAllowedChars($input);
    }

    private function removeNotAllowedChars(string $input): string
    {
        return preg_replace(
            sprintf('/[^0-9\.%s]/', implode('\\', self::ALLOW_OPERATORS)),
            '',
            $input
        );
    }

    public function push(string $input): self
    {
        $cleanInput = $this->cleanInput($input);

        if ($this->isOperatorSign($cleanInput)) {
            if (empty($this->lastOperator)) {
                // 1st case, when there wasn't any operator before, so we got the first one
                return new self(
                    $this->currentValue,
                    '',
                    OperationFactory::forOperator($cleanInput)
                );
            }
            // 2st case, when there was an operator, so we have to make the Operation here!
            return new self(
                (string)$this->lastOperator
                    ->operate(floatval($this->bufferValue), floatval($this->currentValue)),
                '',
                null
            );
        }

        // 3rd case, increment the currentValue
        if (empty($this->lastOperator)) {
            return new static($this->bufferValue, $this->currentValue . $cleanInput);
        }

        $this->currentValue .= $cleanInput;
        // 4th case, do the operation (buffer & newValue)
        return new self($this->bufferValue, $this->currentValue, $this->lastOperator);
    }

    private function isOperatorSign(string $cleanInput): bool
    {
        return in_array($cleanInput, self::ALLOW_OPERATORS);
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
