<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

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
    line(PHP_EOL . 'Hello, %s! '. PHP_EOL, $name);
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
