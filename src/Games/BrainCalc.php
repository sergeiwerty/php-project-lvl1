<?php

namespace Brain\Games\BrainCalc;

use function Brain\Games\Engine\runEngine;

function generateRandomOperation(): string
{
    $operators = '+-*';
    $index = rand(0, 2);
    return $operators[$index];
}

function calculate($operator, $operand1, $operand2)
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            throw new Exception("Unknown operator: {$operator}!");
    }
}

function runCalcGame()
{
    $description = "What is the result of the expression?";
    $roundData = function () {
        $operand1 = rand(0, 99);
        $operand2 = rand(0, 99);
        $operator = generateRandomOperation();
        $question = "{$operand1} {$operator} {$operand2}";
        $correctAnswer = strval(calculate($operator, $operand1, $operand2));
        return [$question, $correctAnswer];
    };
    return runEngine($description, $roundData);
}
