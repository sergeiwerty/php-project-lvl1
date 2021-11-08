<?php

namespace Brain\Games\BrainCalc;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = "What is the result of the expression?";

function generateRandomOperation(): string
{
    $operators = '+-*';
    $index = rand(0, 2);
    return $operators[$index];
}

function calculate(string $operator, int $operand1, int $operand2): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            throw new \Exception("Unknown operator: {$operator}!");
    }
}

function runGameCalc(): mixed
{
    $roundData = function (): array {
        $operand1 = rand(0, 99);
        $operand2 = rand(0, 99);
        $operator = generateRandomOperation();
        $question = "{$operand1} {$operator} {$operand2}";
        $correctAnswer = strval(calculate($operator, $operand1, $operand2));
        return [$question, $correctAnswer];
    };
    return runEngine(DESCRIPTION, $roundData);
}
