<?php

namespace App\MatchMaker\Encounter;

use App\MatchMaker\Interfaces\PlayerInterface;

class Score
{
    public function __construct(public PlayerInterface $player, public int $score)
    {
    }
}