<?php

namespace Games;

use function BrainGAmes\calcGame\functions\generateQuestionData;
use function BrainGames\Engine\play;

function calcGame()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'What is the result of the expression?';

            case 'question':
                return 'BrainGames\calcGame\functions\getQuestion';
            case "gameData":
                return generateQuestionData();
            case 'answer':
                return 'BrainGames\calcGame\functions\getGameAnswer';
        };
    });
}
