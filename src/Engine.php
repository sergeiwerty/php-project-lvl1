<?php

namespace Brain\Games\Engine;

use function cli\line as line;
use function cli\prompt as prompt;

const ROUNDS_COUNT = 3;

function runEngine(string $description, callable $roundData): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);
    line($description);
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        list($question, $correctAnswer) = $roundData();
        line("Question: {$question}");
        $userAnswer = \cli\prompt("Your answer: ");
        if ($correctAnswer !== $userAnswer) {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, {$name}!");
}
