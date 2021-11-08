<?php

namespace Brain\Games\BrainProgression;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = "What number is missing in the progression?";

function makeProgression(int $firstMember, int $diff, int $progressionLength): array
{
    $progression = [];
    for ($index = 0; $index < $progressionLength; $index += 1) {
        $progression[$index] = $firstMember + $index * $diff;
    }
    return $progression;
}

function runGameProgression(): mixed
{
    $roundData = function (): array {
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
    return runEngine(DESCRIPTION, $roundData);
}
