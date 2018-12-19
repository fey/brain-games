<?php

namespace Games\IsEven;

use function BrainGames\Engine\play;

function game()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'Answer "yes" if number even otherwise answer "no".';

            case 'question':
                return 'Games\IsEven\getQuestion';
            case "gameData":
                return rand(1, 10);
            case 'answer':
                return 'Games\IsEven\getGameAnswer';
        };
    });
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}


function getGameAnswer(int $number): string
{
    return isEven($number) ? "yes" : "no";
}

function getQuestion($number)
{
    // return rand(1, 10);
    return $number;
}
