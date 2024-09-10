<?php

namespace App\MatchMaker\Interfaces;

interface PlayerInterface
{
    public function getName(): string;

    public function getRatio(): float;

    public function updateRatioAgainst(self $player, int $result): void;
}