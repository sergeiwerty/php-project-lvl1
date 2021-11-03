<?php

namespace Brain\Games\BrainEven;

use function Brain\Games\Engine\runEngine;

function isEven($num): bool
{
    return $num % 2 === 0;
}

function runEvenGame()
{
    $description = "Answer 'yes' if the number is even, otherwise answer 'no'.";
    $roundData = function () {
        $num = rand(0, 99);
        $question = strval($num);
        $correctAnswer = isEven($num) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    return runEngine($description, $roundData);
}
