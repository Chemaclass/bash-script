<?php declare(strict_types = 1);

namespace Calculator\V1;

final class Input
{
    const DEFAULT_OPERATION = Operation::SUM;

    /** @var float */
    private $value;

    /** @var string */
    private $operator;

    /** @var string */
    private $originalInput;

    /**
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->originalInput = $input;

        $charsFromInput = str_split(ltrim($input, '0'));
        if (is_numeric($charsFromInput[0])) {
            $this->operator = self::DEFAULT_OPERATION;
            $this->value = floatval($input);
        } else {
            $this->operator = $charsFromInput[0];
            $this->value = floatval(implode('', array_slice($charsFromInput, 1)));
        }
    }

    public function operator(): string
    {
        return $this->operator;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->originalInput;
    }
}