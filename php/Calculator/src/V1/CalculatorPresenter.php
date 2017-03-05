<?php declare(strict_types = 1);

namespace Calculator\V1;

final class CalculatorPresenter
{
    /**
     * @var Calculator
     */
    private $calculator;

    /**
     * @param Calculator $calculator
     */
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @return string
     */
    public function history()
    {
        $historyStr = '';
        foreach ($this->calculator->history() as $history) {
            $historyStr = '(' . $historyStr . $history . ')';
        }
        return $historyStr;
    }
}