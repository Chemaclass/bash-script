<?php declare(strict_types = 1);

namespace Calculator;

final class Input
{
    const DEFAULT_OPERATOR = '+';

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

        $split = str_split(ltrim($input, '0'));
        if (is_numeric($split[0])) {
            $this->operator = self::DEFAULT_OPERATOR;
            $this->value = floatval($input);
        } else {
            $this->operator = $split[0];
            $this->value = floatval(implode('', array_slice($split, 1)));
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