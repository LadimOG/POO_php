<?php

namespace App\MatchMaker\Player;

use App\MatchMaker\Interfaces\PlayerInterface;

class Player implements PlayerInterface
{
    public function __construct(protected string $name, protected float $ratio = 400.0)
    {
        
    }
    public function getName(): string
    {
        return $this->name;
    }

    protected function probabilityAgainst(PlayerInterface $player): float
    {
        return 1 / (1 + (10 ** (($player->getRatio() - $this->getRatio()) / 400)));
    }

    public function updateRatioAgainst(PlayerInterface $player, int $result): void
    {
        $this->ratio += 32 * ($result - $this->probabilityAgainst($player));
    }

    public function getRatio(): float
    {
        return $this->ratio;
    }
}