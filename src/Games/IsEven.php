<?php

namespace Games\IsEven;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function game(): array
{
    $game = function () {
        $question = rand(1, 100);
        $answer   = getGameAnswer($question);
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    return [DESCRIPTION, $game];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function getGameAnswer(int $number): string
{
    return isEven($number) ? "yes" : "no";
}
