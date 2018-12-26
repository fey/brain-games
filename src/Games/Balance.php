<?php

namespace Games\Balance;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Balance the given number.';

function game()
{
    $game = function () {
        $question = "";
        $answer = "";
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    run(DESCRIPTION, $game);
}
