<?php

namespace Games\IsEven;

use function BrainGames\Engine\play;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function game()
{
    play(DESCRIPTION, function () {
        $question = getQuestion();
        return [
            'question' => $question,
            'answer' => getGameAnswer($question),
        ];
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

function getQuestion()
{
    return rand(1, 10);
}
