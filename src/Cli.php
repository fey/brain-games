<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;
line('Welcome to the Brain Games!');
function run($game = null)
{
    if ($game) {
        $playerName = prompt('May I have your name?');
        line(PHP_EOL . 'Hello, %s! ' . PHP_EOL, $playerName);
        ['description' => $description] = $game();
        line($description . PHP_EOL);
        for ($i = 1; $i <= ROUNDS; $i += 1) {
            ['question' => $question, 'answer' => $gameAnswer] = $game();
            line('Question: %s', $question);
            $playerAnswer = prompt('Your answer');

            if ($gameAnswer === $playerAnswer) {
                line('Correct!');
            } else {
                line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
                line("Let's try again, %s!", $playerName);
                return;
            }
        }
        line("Congratulations, {$playerName}!");

        return;
    } else {

        $games = require_once(__DIR__ . '/menu.php');
        $game = \cli\menu($games, $default = false, $title = 'Choose a game number');
        if (function_exists($game)) {

        return $game();
        }
    line("Wrong game number!");
    }
}
