<?php

class QueuingPlayer extends Player
{   

    public function __construct(Player $player, public int $range = 1)
    {
        parent::__construct($player->getName(), $player->getRatio());
    }


    public function getRange()
    {
        return $this->range;
    }
}
