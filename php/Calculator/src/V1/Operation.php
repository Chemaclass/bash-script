<?php declare(strict_types = 1);

namespace Calculator\V1;

use Calculator\V1\Exceptions\NoOperatorError;
use Calculator\V1\Operation\OperationFactory;

final class Operation
{
    const SUM = '+';
    const MIN = '-';
    const MUL = '*';
    const DIV = '/';
    const EQU = '=';

    /** @var float */
    private $buffer;

    /** @var Input */
    private $input;

    /** @var array */
    private $allowOperations;

    /**
     * @param float $buffer
     * @param Input $input
     * @param array $allowOperations
     * @throws NoOperatorError
     */
    public function __construct(float $buffer, Input $input, array $allowOperations)
    {
        $this->buffer = $buffer;
        $this->input = $input;
        $this->allowOperations = $allowOperations;

        if ($this->shouldHasOperatorButDoesNot()) {
            throw new NoOperatorError((string)$input);
        }
    }

    private function shouldHasOperatorButDoesNot(): bool
    {
        if (!empty($this->buffer)) {
            return !$this->hasOperator();
        }

        return false;
    }

    private function hasOperator(): bool
    {
        return in_array(substr((string)$this->input, 0, 1), $this->allowOperations);
    }

    public function operate(): float
    {
        return OperationFactory::forOperator($this->input->operator())
            ->operate($this->buffer, $this->input->value());
    }
}