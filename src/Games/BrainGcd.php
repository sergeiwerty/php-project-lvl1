<?php

namespace Brain\Games\BrainGcd;

use function Brain\Games\Engine\runEngine;

function gcdCalc($num1, $num2)
{
    if ($num2 == 0) {
        return $num1;
    }
    return gcdCalc($num2, $num1 % $num2);
}

function runGcdGame()
{
    $description = "Find the greatest common divisor of given numbers.";
    $roundData = function () {
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        $question = "{$firstNum} {$secondNum}";
        $correctAnswer = strval(gcdCalc($firstNum, $secondNum));
        return [$question, $correctAnswer];
    };
    return runEngine($description, $roundData);
}
