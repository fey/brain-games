<?php

namespace Games\Calc;

use function BrainGames\Engine\play;

const DESCRIPTION = 'What is the result of the expression?';
function game()
{
    play(DESCRIPTION, function () {
        $gameData = generateGameData();
        $question = getQuestion($gameData);
        return [
            'question' => $question,
            'answer' => getGameAnswer($gameData),
        ];
    });
}

function getOperand()
{
    $operands = str_split("+-*");
    return $operands[array_rand($operands)];
}

function generateGameData()
{
    return [
        'firstNumber' => rand(1, 50),
        'operand' =>getOperand(),
        'secondNumber' => rand(1, 50),
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
