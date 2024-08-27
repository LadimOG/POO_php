<?php

namespace App\MatchMaker\Interfaces;

use App\MatchMaker\Player\AbstractPlayer;

interface Ratio
{
    public function getRatio(): float;

    public function updateRatioAgainst(AbstractPlayer $player, int $result): void;
}