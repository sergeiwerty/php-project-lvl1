<?php

namespace Brain\Games\BrainEven;

function isEven($num)
{
    return $num % 2 === 0;
}

//function generateRandomNum($min = 0, $max = 100)
//{
//    print_r(floor($min + rand() * ($max - $min + 1)));
//    print_r("\n");
//    return floor($min + rand() * ($max - $min + 1));
//}

function runEvenGame()
{
    $description = "Answer 'yes' if the number is even, otherwise answer 'no'";

    \cli\line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name? ');
    \cli\line("Hello, %s!", $name);
    \cli\line("{$description}");
    for ($i = 0; $i < 3; $i += 1) {
        $num = rand(0, 100);
//        \cli\line("{$description}");
        \cli\line("Question: {$num}");
        $userAnswer = \cli\prompt("Your answer: ");
        $correctAnswer = isEven($num) ? 'yes' : 'no';
        if ($correctAnswer !== $userAnswer) {
            \cli\line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            \cli\line("Let's try again, {$name}");
            return;
        }
        \cli\line("Correct!");
    }
    \cli\line("Congratulations, {$name}");
}
