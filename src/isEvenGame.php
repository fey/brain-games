<?php

namespace BrainGames\isEvenGame;

use function \rand;
use function \cli\line;
use function \cli\prompt;

use function BrainGames\Cli\printHello;
use function BrainGames\Cli\printWelcome;
use function BrainGames\Cli\askName;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
const ROUNDS = 3;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}


function getGameAnswer(int $number): string
{
    return isEven($number) ? "yes" : "no";
}


function game()
{
    printWelcome();
    line(DESCRIPTION . PHP_EOL);
    $name = askName();
    printHello($name);
    $isCorrect = true;

    for ($i = 1; $i <= ROUNDS; $i += 1) {
        $question = \rand(1, 100);
        line('Question: %s', $question);
        $gameAnswer = getGameAnswer($question);
        $playerAnswer = prompt('Your answer');
    
        if ($gameAnswer === $playerAnswer) {
            line('Correct!');
        } else {
            $isCorrect = false;
            break;
        }
    }

    if ($isCorrect) {
        line("Congratulations, {$name}!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
        line("Let's try again, %s!", $name);
    }
}
