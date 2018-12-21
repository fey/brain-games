<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function run($description = "", $game = null)
{
    line('Welcome to the Brain Games!');

    $games = require_once(__DIR__ . '/menu.php');
    if ($game) {
        line($description . PHP_EOL);
        $playerName = prompt('May I have your name?');
        line(PHP_EOL . 'Hello, %s! ' . PHP_EOL, $playerName);
        for ($i = 1; $i <= ROUNDS; $i += 1) {
            ['question' => $question, 'answer' => $gameAnswer] = $game();
            line('Question: %s', $question);
            $playerAnswer = prompt('Your answer');

            if ($gameAnswer === $playerAnswer) {
                line('Correct!');
            } else {
                line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
                line("Let's try again, %s!", $playerName);
                return run();
            }
        }
        line("Congratulations, {$playerName}!");
        return;
    } else {

        $game = \cli\menu($games, $default = false, $title = 'Choose a game number');
        if(function_exists($game)) {
            return $game();
        }
        line("Wrong game number!");
    }
}
