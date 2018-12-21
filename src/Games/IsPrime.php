<?php

namespace Games\IsPrime;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function game()
{
    $game = function () {
        $question = rand(1, 100);
        $answer = getGameAnswer($question);
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    run(DESCRIPTION, $game);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    $iter = function ($delim) use ($number, &$iter) {
        if ($delim ** 2 <= $number) {
            if ($number % $delim === 0) {
                return false;
            }
            return $iter($delim + 1);
        }
        return true;
    };
    return $iter(2);
}

function getGameAnswer(int $number): string
{
    return isPrime($number) ? "yes" : "no";
}
