<?php

namespace BrainGames\nodGame\functions;

function modulo($max, $min)
{
    if ($min === 0) {
        return 0;
    }
    return $max % $min;
}

function generateGameData()
{
    $num1 = rand(4, 20);
    $num2 = rand(4, 20);
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
