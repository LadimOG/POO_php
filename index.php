<?php

declare(strict_types=1);

class Encounter
{
    const RESULT_WINNER = 1;
    const RESULT_LOSER = -1;
    const RESULT_DRAW = 0;
    const RESULT_POSSIBILITIES = [self::RESULT_WINNER, self::RESULT_LOSER, self::RESULT_DRAW];

    public static function probabilityAgainst(Player $levelPlayerOne, Player $levelPlayerTwo)
    {
        return 1/(1+(10 ** (($levelPlayerTwo->getLevel() - $levelPlayerOne->getLevel())/400)));
    }

    public static function setNewLevel(Player $levelPlayerOne, Player $levelPlayerTwo, int $playerOneResult)
    {
        if (!in_array($playerOneResult, self::RESULT_POSSIBILITIES)) 
        {
            trigger_error(sprintf('Invalid result. Expected %s',implode(' or ', self::RESULT_POSSIBILITIES)));
        }

        $currentLevel = $levelPlayerOne->getLevel();
        $newValue = (int) (32 * ($playerOneResult - self::probabilityAgainst($levelPlayerOne, $levelPlayerTwo))); 
        $currentLevel += $newValue;
        $levelPlayerOne->setLevel($currentLevel);
    }
}

class Player
{

    public function __construct(private int $level)
    {
        $this->level = $level;
    }


    public function setLevel(int $level):void
    {
        if($level < 0)
        {
            trigger_error('le niveau doit etre superrieur à 0', E_USER_ERROR);
        }
        $this->level = $level;
    }

    public function getLevel():int
    {
        return $this->level;
    }
}

$encount = new Encounter;

$greg = new Player(400);
$jade = new Player(800);


echo sprintf(
    'Greg à %.2f%% chance de gagner face a Jade',
    Encounter::probabilityAgainst($greg, $jade)*100
).PHP_EOL;

// Imaginons que greg l'emporte tout de même.
Encounter::setNewLevel($greg, $jade, Encounter::RESULT_WINNER);
Encounter::setNewLevel($jade, $greg, Encounter::RESULT_LOSER);

echo sprintf(
    'les niveaux des joueurs ont évolués vers %s pour Greg et %s pour Jade',
    $greg->getLevel(),
    $jade->getLevel()
);

exit(0);