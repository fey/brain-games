<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Cli\askName;
use function \BrainGames\Cli\printBye;
use function \BrainGames\Cli\printHello;
use function \BrainGames\Cli\printWelcome;

const ROUNDS = 3;
function play($game)
{
    printWelcome();
    line($game('description') . PHP_EOL);
    $name = askName();
    printHello($name);

    $isCorrect = true;
    for ($i = 1; $i <= ROUNDS; $i += 1) {
        $gameData = $game('gameData');
        $question = $game('question')($gameData);

        line('Question: %s', $question);

        $playerAnswer = prompt('Your answer');
        $gameAnswer = $game('answer')($gameData);

        if ($gameAnswer === $playerAnswer) {
            line('Correct!');
        } else {
            $isCorrect = false;
            break;
        }
    }

    printBye($name, $playerAnswer, $gameAnswer, $isCorrect);
}
