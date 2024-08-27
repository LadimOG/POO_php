<?php

namespace App\MatchMaker\Player;

use App\MatchMaker\Player\AbstractPlayer;
use App\MatchMaker\Interfaces\PlayerInterface;

class Player extends AbstractPlayer implements PlayerInterface
{
    public function getName(): string
    {
        return $this->name;
    }

    protected function probabilityAgainst(AbstractPlayer $player): float
    {
        return 1 / (1 + (10 ** (($player->getRatio() - $this->getRatio()) / 400)));
    }

    public function updateRatioAgainst(AbstractPlayer $player, int $result): void
    {
        $this->ratio += 32 * ($result - $this->probabilityAgainst($player));
    }

    public function getRatio(): float
    {
        return $this->ratio;
    }
}