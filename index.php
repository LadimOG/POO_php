<?php

declare(strict_types=1);

class Encounter
{
    const RESULT_WINNER = 1;
    const RESULT_LOSER = -1;
    const RESULT_DRAW = 0;
    const RESULT_POSSIBILITIES = [self::RESULT_WINNER, self::RESULT_LOSER, self::RESULT_DRAW];

    function probabilityAgainst(Player $levelPlayerOne, Player $levelPlayerTwo)
    {
        return 1/(1+(10 ** (($levelPlayerTwo->level - $levelPlayerOne->level)/400)));
    }

    function setNewLevel(Player $levelPlayerOne, Player $levelPlayerTwo, int $playerOneResult)
    {
        if (!in_array($playerOneResult, self::RESULT_POSSIBILITIES)) 
        {
            trigger_error(sprintf('Invalid result. Expected %s',implode(' or ', self::RESULT_POSSIBILITIES)));
        }

        $levelPlayerOne->level += (int) (32 * ($playerOneResult - $this->probabilityAgainst($levelPlayerOne, $levelPlayerTwo))); 
    }


}

class Player
{
    public int $level;

}

$encount = new Encounter;


$greg = new Player;
$jade = new Player;

$greg->level = 400;
$jade->level = 800;


echo sprintf(
    'Greg à %.2f%% chance de gagner face a Jade',
    $encount->probabilityAgainst($greg, $jade)*100
).PHP_EOL;

// Imaginons que greg l'emporte tout de même.
$encount->setNewLevel($greg, $jade, Encounter::RESULT_WINNER);
$encount->setNewLevel($jade, $greg, Encounter::RESULT_LOSER);

echo sprintf(
    'les niveaux des joueurs ont évolués vers %s pour Greg et %s pour Jade',
    $greg->level,
    $jade->level
);

exit(0);