<?php

namespace Games;

use function BrainGames\Engine\play;
use function BrainGames\nodGame\functions\getQuestion;
use function BrainGames\nodGame\functions\generateGameData;

function nodGame()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'Find the greatest common divisor of given numbers.';

            case 'question':
                return 'BrainGames\nodGame\functions\getQuestion';
            case "gameData":
                return generateGameData();
            case 'answer':
                return 'BrainGames\nodGame\functions\getGameAnswer';
        };
    });
}
