<?php

namespace Brain\Games\BrainPrime;

use function Brain\Games\Engine\runEngine;

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($divisor = 2; $divisor < $number; $divisor += 1) {
        if ($number % $divisor === 0) {
            return false;
        }
    }
    return true;
}

function runPrimeGame(): any
{
    $description = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";
    $roundData = function (): array {
        $num = rand(0, 99);
        $question = strval($num);
        $correctAnswer = isPrime($num) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    return runEngine($description, $roundData);
}
