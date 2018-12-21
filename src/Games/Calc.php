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
        $answer   = getGameAnswer($firstNumber, $secondNumber, $operand);
        return [
            'question' => $question,
            'answer'   => $answer,
            'description' => DESCRIPTION
        ];
    };
    run($game);
}

function getGameAnswer($firstNum, $secondNum, $operand):string
{
    switch ($operand) {
        case "+":
            return $firstNum + $secondNum;
        case "*":
            return $firstNum * $secondNum;
        case "-":
            return $firstNum - $secondNum;
    }
}
