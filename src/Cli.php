<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;
use function \cli\menu as cliMenu;

const ROUNDS = 3;
function run(string $description, $game)
{
    $playerName = prompt('May I have your name?');
    line(PHP_EOL . 'Hello, %s! ' . PHP_EOL, $playerName);
    line($description . PHP_EOL);

    for ($i = 1; $i <= ROUNDS; $i += 1) {
        ['question' => $question, 'answer'   => $gameAnswer] = $game();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer');

        if ($gameAnswer !== $playerAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
            line("Let's try again, %s!" . PHP_EOL, $playerName);
            break;
        }
        line('Correct!');
    }

    return menu();
}

function menu()
{
    $games = require __DIR__ . \DIRECTORY_SEPARATOR . 'Gameset.php';
    line('Welcome to the Brain Games!');
    $game = cliMenu($games, null, 'Choose a game number');
    if (is_callable($game)) {
        return $game();
    }
    line("Wrong game number!" . PHP_EOL);
    return menu();
}
