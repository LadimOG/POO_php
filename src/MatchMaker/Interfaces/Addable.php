<?php
namespace App\MatchMaker\Interfaces;

use App\MatchMaker\Player\Player;

interface Addable
{
    public function addPlayer(Player $player): void;

    public function addPlayers(Player ...$players): void;
}