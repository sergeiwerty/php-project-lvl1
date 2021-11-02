<?php

namespace Brain\Games\BrainEven;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use Brain\Games\Engine;

function isEven($num): bool
{
    return $num % 2 === 0;
}

$description = "Answer 'yes' if the number is even, otherwise answer 'no'";

$getRoundData = function()
{
        $num = rand(0, 99);
        $question = \cli\prompt("Your answer: ");
        $correctAnswer = isEven($num) ? 'yes' : 'no';
        return [$question, $correctAnswer];
};

Engine\runEngine($description, $getRoundData);
