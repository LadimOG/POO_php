<?php
namespace App\MatchMaker\Player;

use App\MatchMaker\Interfaces\Rangeable;

final class QueuingPlayer extends Player implements Rangeable
{   

    public function __construct(AbstractPlayer $player, private int $range = 1)
    {
        parent::__construct($player->getName(), $player->getRatio());
    }


    public function getRange(): int
    {
        return $this->range;
    }
}