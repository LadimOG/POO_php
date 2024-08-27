<?php
namespace App\MatchMaker\Interfaces;

use App\MatchMaker\Player\QueuingPlayer;

interface Findable
{
    public function findOponents(QueuingPlayer $player): array;
}