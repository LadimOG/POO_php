<?php
require_once "Player.php";

class BlitzPlayer extends Player
{
    public function __construct(public int $level = 1200, Player $ratio)
    {
        parent::__construct($ratio->getRatio());
    }

    public function updadeRatio(Player $player):float
    {
        return $player->getRatio()*4;
    }
}