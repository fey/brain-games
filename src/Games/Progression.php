<?php

namespace Games\Progression;

use function BrainGames\Engine\play;

const DESCRIPTION = 'What number is missing in the progression?';


function game()
{
    play(DESCRIPTION, function () {
        $step = rand(1, 5);
        $maxSize = 10;
        $progression = generateProgression($maxSize, $step);
        $hidden = array_rand($progression);
        $answer = getGameAnswer($progression, $hidden);
        $question = generateQuestion($progression, $hidden);
        return [
            'question' => $question,
            'answer' => $answer,
        ];
    });
}

function generateProgression($maxSize, $step)
{
    $progression = [];
    for ($i = 0; $i < $maxSize; $i += 1) {
        $progression[] = $i * $step;
    }
    return $progression;
}

function getGameAnswer($progression, $index): string
{
    return $progression[$index];
}

function hideAnswer($progression, $index)
{
    $progression[$index] = '..';

    return $progression;
}

function generateQuestion($progression, $index)
{
    return implode(" ", hideAnswer($progression, $index));
}
