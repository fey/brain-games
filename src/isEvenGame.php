<?php

namespace BrainGames\brainEven;

use function \rand;
use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\greetings;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\printHello;
use function BrainGames\Cli\welcome;
use function BrainGames\Cli\askName;

function getPlayerAnswer()
{
    return prompt('Your answer');
}
function isValidAnswer(string $answer): bool
{
    return \in_array($answer, ['no', 'yes']);
}
function getGameAnswer(int $number): string
{
    $isEven = $number % 2 === 0;
    return $isEven ? "yes" : "no";
}
function isCorrectAnswer(string $gameAnswer, string $playerAnswer): bool
{
    return $gameAnswer === $playerAnswer;
}
function printRules()
{
    line('Answer "yes" if number even otherwise answer "no".' . PHP_EOL);
}
function game()
{
    welcome();
    printRules();
    $name = askName();
    printHello($name);
    $isCorrect = true;
    $questionNumber = 1;

    while ($isCorrect && $questionNumber <= 3) {
        $number = \rand(1, 100);
        line('Question: %s', $number);
        $gameAnswer = getGameAnswer($number);
        $playerAnswer = getPlayerAnswer($number);

        if (isValidAnswer($playerAnswer) && isCorrectAnswer($gameAnswer, $playerAnswer)) {
            line('Correct!');
        } else {
            $isCorrect = false;
        }
        $questionNumber += 1;
    }
    if ($isCorrect) {
        line("Congratulations, {$name}!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
        line("Let's try again, %s!", $name);
    }
}
