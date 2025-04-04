<?php

namespace Games\Progression;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;

function game(): array
{
    $game = function () {
        $firstElement = rand(1, 100);
        $step = rand(1, 5);
        /** @var int[] $progression */
        $progression = generateProgression($firstElement, $step, PROGRESSION_SIZE);

        $indexOfHidden = array_rand($progression);

        $answer = (string) $progression[$indexOfHidden];
        $question = function () use ($progression, $indexOfHidden) {
            $progression[$indexOfHidden] = '..';
            return implode(" ", $progression);
        };

        return [
            'question' => $question(),
            'answer'   => $answer,
        ];
    };
    return [DESCRIPTION, $game];
}

function generateProgression(int $firstElement, int $step, int $size): array
{
    $progression = [];

    for ($i = 0; $i < $size; $i += 1) {
        $progression[] = $firstElement + $step * $i;
    }

    return $progression;
}
