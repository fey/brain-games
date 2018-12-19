<?php

namespace Games\Calc;

use function BrainGames\Cli\play;

const DESCRIPTION = 'What is the result of the expression?';
function game()
{
    $game = function () {
        $gameData = generateGameData();
        $question = getQuestion($gameData);
        $answer   = getGameAnswer($gameData);
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };
    play(DESCRIPTION, $game);
}

function getOperand()
{
    $operands = ["+", "-", "*"];
    return $operands[array_rand($operands)];
}

function generateGameData()
{
    return [
        'firstNumber'  => rand(1, 50),
        'operand'      => getOperand(),
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
