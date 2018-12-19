<?php

namespace Games\Progression;

use function BrainGames\Cli\play;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;

function game()
{
    $game = function () {
        $progression = generateProgression();
        $indexOfHidden = array_rand($progression);
        $answer = getGameAnswer($progression, $indexOfHidden);
        $question = generateQuestion($progression, $indexOfHidden);

        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    play(DESCRIPTION, $game);
}

function generateProgression()
{
    $firstElement = rand(1, 100);
    $step = rand(1, 5);
    $iter = function ($acc) use ($step, &$iter) {
        $currentSize = count($acc);
        if ($currentSize < PROGRESSION_SIZE) {
            $acc[] = $acc[$currentSize - 1] + $step;
            return $iter($acc);
        }

        return $acc;
    };

    return $iter([$firstElement]);
}

function getGameAnswer($progression, $indexOfHidden): string
{
    return $progression[$indexOfHidden];
}

function generateQuestion($progression, $hiddenIndex):string
{
    $progression[$hiddenIndex] = '..';
    return implode(" ", $progression);
}
