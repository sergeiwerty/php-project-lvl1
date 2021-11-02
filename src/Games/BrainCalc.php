<?php

namespace Brain\Games\BrainCalc;

use function Brain\Games\BrainEven\isEven;

function generateRandomOperation()
{
    $operators = '+-*';
    $index = rand(0, 2);
    return $operators[$index];
}

function calculate ($operator, $operand1, $operand2)
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand1;
        default:
            throw new Exception("Unknown operator: {$operator}!");
    }
}

function runCalcGame()
{
    $description = "What is the result of the expression?";

    $operand1 = rand(0, 99);
    $operand2 = rand(0, 99);
    $operator = generateRandomOperation();
    $question = "{$operand1} {$operator} {$operand2}";
    $correctAnswer = strval(calculate($operator, $operand1, $operand2));

    \cli\line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name? ');
    \cli\line("Hello, %s!", $name);
    \cli\line("{$description}");
    for ($i = 0; $i < 3; $i += 1) {
        \cli\line("Question: {$question}");
        $userAnswer = \cli\prompt("Your answer: ");
        if ($correctAnswer !== $userAnswer) {
            \cli\line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            \cli\line("Let's try again, {$name}");
            return;
        }
        \cli\line("Correct!");
    }
    \cli\line("Congratulations, {$name}");
}