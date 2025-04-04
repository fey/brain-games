<?php

namespace Games\IsPrime;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function game(): array
{
    $game = function () {
        $question = rand(1, 100);
        $answer = getGameAnswer($question);
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    return [DESCRIPTION, $game];
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($delim = 2; $delim ** 2 <= $number; $delim += 1) {
        if ($number % $delim === 0) {
            return false;
        }
    }
    return true;
}

function getGameAnswer(int $number): string
{
    return isPrime($number) ? "yes" : "no";
}
