<?php declare(strict_types = 1);

namespace Calculator;

use Calculator\Exceptions\NoOperatorError;

final class Operation
{
    const SUM = '+';
    const MIN = '-';
    const MUL = '*';
    const DIV = '/';

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

    public function operate(): float
    {
        // TODO: SRP!
        switch ($this->input->operator()) {
            case self::SUM:
                return $this->buffer + $this->input->value();
            case self::MIN:
                return $this->buffer - $this->input->value();
            case self::MUL:
                return $this->buffer * $this->input->value();
            case self::DIV:
                return $this->buffer / $this->input->value();
        }

        throw new NoOperatorError('');
    }

    private function hasOperator(): bool
    {
        return in_array(substr((string)$this->input, 0, 1), $this->allowOperations);
    }
}