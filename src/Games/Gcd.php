<?php

namespace Brain\Games\BrainGcd;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function gcdCalc(int $num1, int $num2): int
{
    if ($num2 == 0) {
        return $num1;
    }
    return gcdCalc($num2, $num1 % $num2);
}

function runGameGcd(): mixed
{
    $description = "Find the greatest common divisor of given numbers.";
    $roundData = function (): array {
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        $question = "{$firstNum} {$secondNum}";
        $correctAnswer = strval(gcdCalc($firstNum, $secondNum));
        return [$question, $correctAnswer];
    };
    return runEngine(DESCRIPTION, $roundData);
}
