<?php

namespace Games\Balance;

const DESCRIPTION = 'Balance the given number.';

function game(): array
{
    $game = function () {
        $question = "";
        $answer = "";
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    return [DESCRIPTION, $game];
}
