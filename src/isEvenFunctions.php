<?php
namespace BrainGames\isEven\functions;

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
    return $number;
}
