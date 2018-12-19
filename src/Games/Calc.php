<?php

namespace Games\Calc;

use function BrainGames\Engine\play;

function game()
{
    play(function ($gamePart) {
        switch ($gamePart) {
            case 'description':
                return 'What is the result of the expression?';

            case 'question':
                return 'Games\Calc\getQuestion';
            case "gameData":
                return generateQuestionData();
            case 'answer':
                return 'Games\Calc\getGameAnswer';
        };
    });
}

function getOperand()
{
    $operands = str_split("+-*");
    return $operands[array_rand($operands)];
}

function generateQuestionData()
{
    return [
        'firstNumber' => rand(1, 10),
        'operand' =>getOperand(),
        'secondNumber' => rand(1, 10),
    ];
}

function getGameAnswer($questionData):string
{
    ['firstNumber' => $firstNum, 'operand' => $operand, 'secondNumber' => $secondNum] = $questionData;
    switch ($operand) {
        case "+":
            return $firstNum + $secondNum;
        case "*":
            return $firstNum * $secondNum;
        case "-":
            return $firstNum - $secondNum;
    }
}

function getQuestion($questionData):string
{
    return implode(" ", $questionData);
}
