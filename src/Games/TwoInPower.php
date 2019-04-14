<?php

namespace Games\TwoInPower;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What are exponent of two?';


function game()
{
    $game = function () {
        $pow      = rand(1, 10);
        $question = "2 ^ {$pow}";
        $answer   = strval(pow(2, $pow));
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    return [DESCRIPTION, $game];
}
