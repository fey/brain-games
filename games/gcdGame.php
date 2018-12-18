<?php

namespace Games;

use function BrainGames\Engine\play;
use function BrainGames\gcdGame\functions\getQuestion;
use function BrainGames\gcdGame\functions\generateGameData;

function gcdGame()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'Find the greatest common divisor of given numbers.';

            case 'question':
                return 'BrainGames\gcdGame\functions\getQuestion';
            case "gameData":
                return generateGameData();
            case 'answer':
                return 'BrainGames\gcdGame\functions\getGameAnswer';
        };
    });
}