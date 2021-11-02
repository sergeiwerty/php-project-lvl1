<?php

namespace Brain\Games\Engine;

function runEngine ($description, $getRoundData)
{
    $roundsCount = 3;

    \cli\line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name? ');
    \cli\line("Hello, %s!", $name);
    \cli\line($description);
    for ($i = 0; $i < $roundsCount; $i += 1) {
        list($question, $correctAnswer) = $getRoundData();
        \cli\line("Question: {$question}");
        $userAnswer = \cli\prompt("Your answer: ");
        if ($correctAnswer !== $userAnswer) {
            \cli\line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            \cli\line("Let's try again, {$name}");
            return;
        }
        \cli\line("Correct!");
    }
    \cli\line("Congratulations, {$name}");
}
