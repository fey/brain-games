<?php

namespace Games\Calc;

use Exception;
use Throwable;

const DESCRIPTION = 'What is the result of the expression?';
const OPERANDS = ["+", "-", "*"];

function game(): array
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
    return [DESCRIPTION, $game];
}

function getGameAnswer(int $firstNum, int $secondNum, string $operand): int
{
    switch ($operand) {
        case "+":
            return $firstNum + $secondNum;
        case "*":
            return $firstNum * $secondNum;
        case "-":
            return $firstNum - $secondNum;
        default:
            throw new Exception("Invalid operand. '{$operand}' given");
    }
}
