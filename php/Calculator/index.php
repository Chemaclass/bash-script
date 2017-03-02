<?php
require_once 'vendor/autoload.php';

define('HELP', 'help');
define('END_CHAR', '=');

use Calculator\Calculator;
use Calculator\CalculatorPresenter;

echo '*****************************************' . PHP_EOL;
echo "***** Welcome to ChemCalculator 1.0 *****" . PHP_EOL;
echo '*****************************************' . PHP_EOL;
echo '*** Or write "help" for help ************' . PHP_EOL;

$calculator = new Calculator();
do {
    echo PHP_EOL;
    echo 'Buffer: ' . $calculator->result() . PHP_EOL;
    echo 'Input: ';
    $input = readline();
    if (HELP === $input) {
        showHelp();
    } else {
        $calculator->push($input);
    }
} while (END_CHAR !== $input);

echo 'Result: ' . $calculator->result() . PHP_EOL;
echo 'History: ' . (new CalculatorPresenter($calculator))->history() . PHP_EOL;

function showHelp()
{
    echo PHP_EOL . strtoupper('How this Calculator works: ') . PHP_EOL;
    echo '--------------------------' . PHP_EOL;
    echo '> A calculator executes operations on decimal numbers. 
    Numbers are provided by entering digits (0-9) or a decimal dot (.) one after the other in an input register.' . PHP_EOL;
    echo '> The input register can accept any digit multiple times (leading zeroes are ignored). 
    A decimal dot could be entered only once, consecutive entries must be ignored.' . PHP_EOL;
    echo '> After a number is entered an operation (*, /, +, -, =) is selected, the value into the input register is pushed onto a calculation stack and the input register is cleared, ready to accept the next number.' . PHP_EOL;
    echo '> Selecting an operation executes any operations inside the calculation stack reducing the stack only to the calculated value.' . PHP_EOL;
    echo PHP_EOL;
}