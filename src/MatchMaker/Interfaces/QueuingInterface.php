<?php

namespace App\MatchMaker\Interfaces;

interface QueuingInterface
{
    public function getPlayer(): PlayerInterface;

    public function getRange(): int;

    public function upgradeRange(): void;

    public function updateRatioAgainst(PlayerInterface $player, int $result): void;
}