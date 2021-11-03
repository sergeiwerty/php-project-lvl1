<?php

namespace Brain\Games\BrainProgression;

use function Brain\Games\Engine\runEngine;

function makeProgression($firstMember, $diff, $progressionLength)
{
    $progression = [];
    for ($index = 0; $index < $progressionLength; $index += 1) {
        $progression[$index] = $firstMember + $index * $diff;
    }
    return $progression;
}

function runProgressionGame()
{
    $description = "What number is missing in the progression?";
    $roundData = function () {
        $progressionLength = rand(5, 10);
        $firstMember = rand(0, 99);
        $progression = makeProgression($firstMember, rand(5, 20), $progressionLength);
        $hiddenIndex = rand(1, $progressionLength - 1);
        $hiddenNum = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = "..";
        $question = implode(" ", $progression);
        $correctAnswer = strval($hiddenNum);
        return [$question, $correctAnswer];
    };
    return runEngine($description, $roundData);
}
