<?php

namespace Brain\Games\BrainEven;

use function Brain\Games\Engine\runEngine;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function runEvenGame(): mixed
{
    $description = "Answer 'yes' if the number is even, otherwise answer 'no'.";
    $roundData = function (): array {
        $num = rand(0, 99);
        $question = strval($num);
        $correctAnswer = isEven($num) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    return runEngine($description, $roundData);
}
