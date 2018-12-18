<?php

namespace Games;

use function BrainGames\isEven\functions\getQuestion;
use function BrainGames\Engine\play;
use function BrainGames\isEven\functions\getGameAnswer;

function isEvenGame()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'Answer "yes" if number even otherwise answer "no".';

            case 'question':
                return 'BrainGames\isEven\functions\getQuestion';
            case "gameData":
                return rand(1, 10);
            case 'answer':
                return 'BrainGames\isEven\functions\getGameAnswer';
        };
    });
}
