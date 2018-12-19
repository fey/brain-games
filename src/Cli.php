<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;
function play($description, $game)
{
    printWelcome();
    line($description . PHP_EOL);
    $name = askName();
    printHello($name);
    $isCorrect = true;

    for ($i = 1; $i <= ROUNDS; $i += 1) {
        ['question' => $question, 'answer' => $gameAnswer] = $game();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer');

        if ($gameAnswer === $playerAnswer) {
            line('Correct!');
        } else {
            $isCorrect = false;
            break;
        }
    }

    printBye($name, $playerAnswer, $gameAnswer, $isCorrect);
}
function printWelcome()
{
    line('Welcome to the Brain Game!');
}

function askName()
{
    $name = prompt('May I have your name?');
    return $name;
}


function printHello(string $name)
{
    line(PHP_EOL . 'Hello, %s! ' . PHP_EOL, $name);
}

function printBye($playerName, $playerAnswer, $gameAnswer, $isCorrect)
{
    if ($isCorrect) {
        line("Congratulations, {$playerName}!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
        line("Let's try again, %s!", $playerName);
    }
}
function run($game = null)
{
    if (is_null($game)) {
        printWelcome();
        $name = askName();
        printHello($name);
    } else {
        $game();
    }
}
