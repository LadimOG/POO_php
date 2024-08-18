<?php
require_once "Player.php";
class QueuingPlayer extends Player
{   

    public function __construct(AbstractPlayer $player, private int $range = 1)
    {
        parent::__construct($player->getName(), $player->getRatio());
    }


    public function getRange()
    {
        return $this->range;
    }
}