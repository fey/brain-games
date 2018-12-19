<?php

namespace Games\Gcd;

use function BrainGames\Engine\play;

function game()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'Find the greatest common divisor of given numbers.';
            case 'question':
                return 'Games\Gcd\getQuestion';
            case "gameData":
                return generateGameData();
            case 'answer':
                return 'Games\Gcd\getGameAnswer';
        };
    });
}

function modulo($max, $min)
{
    if ($min === 0) {
        return 0;
    }
    return $max % $min;
}

function generateGameData()
{
    $num1 = rand(2, 50);
    $num2 = rand(2, 50);
    return [$num1, $num2];
}

function getGameAnswer($gameData):string
{
    $min = min($gameData);
    $max = max($gameData);
    $modulo = modulo($max, $min);
    if ($modulo === 0) {
        return $min;
    }
    return getGameAnswer([$min, $modulo]);
}
function getQuestion($questionData):string
{
    return implode(" ", $questionData);
}
