<?php
require_once "Player.php";

class BlitzPlayer extends Player
{
    public function __construct(public string $name = "randomUser", public float $ratio = 1200)
    {
        parent::__construct($name, $ratio);
    }

    public function updadeRatio(AbstractPlayer $player, int $result)
    {
        $this->ratio += 128 * ($result - $this->probabilityAgainst($player));
    }
}