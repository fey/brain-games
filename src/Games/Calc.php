<?php

namespace Games\Calc;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What is the result of the expression?';
const OPERANDS = ["+", "-", "*"];
function game()
{
    $game = function () {
        $firstNumber  = rand(1, 50);
        $operand      = OPERANDS[array_rand(OPERANDS)];
        $secondNumber = rand(1, 50);
        $question = "{$firstNumber} {$operand} {$secondNumber}";
        $answer   = strval(getGameAnswer($firstNumber, $secondNumber, $operand));
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    run(DESCRIPTION, $game);
}

function getGameAnswer(int $firstNum, int $secondNum, string $operand)
{
    switch ($operand) {
        case "+":
            return $firstNum + $secondNum;
        case "*":
            return $firstNum * $secondNum;
        case "-":
            return $firstNum - $secondNum;
        default:
            return false;
    }
}
