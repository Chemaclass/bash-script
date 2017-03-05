<?php
namespace Calculator\V2\Operator;

class EmptyOperatorError extends \Exception
{

    public function __construct()
    {
        parent::__construct('An empty operator can not operate two values!');
    }
}