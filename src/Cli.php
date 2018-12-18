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
function run()
{
    printWelcome();
    $name = askName();
    printHello($name);
}
