<?php

namespace Games\Gcd;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function game()
{
    $game = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$num2}";
        $answer = strval(gcd($num1, $num2));
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    return [DESCRIPTION, $game];
}

function gcd(int $num1, int $num2):int
{
    $min = min([$num1, $num2]);
    $max = max([$num1, $num2]);
    $modulo = ($min === 0) ? 0 : ($max % $min);

    return ($modulo === 0) ? $min : gcd($min, $modulo);
}
