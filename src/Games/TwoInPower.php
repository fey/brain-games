<?php

namespace Games\TwoInPower;


const DESCRIPTION = 'What are exponent of two?';

function game(): array
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
