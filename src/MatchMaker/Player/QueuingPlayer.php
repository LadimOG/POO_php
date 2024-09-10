<?php
namespace App\MatchMaker\Player;

use App\MatchMaker\Interfaces\InlobbyPlayerInterface;
use App\MatchMaker\Interfaces\PlayerInterface;

class QueuingPlayer implements InlobbyPlayerInterface
{   
    protected int $range = 1;

    public function __construct(protected PlayerInterface $player)
    {
        
    }

    public function getName():string
    {
        return $this->player->name;
    }


        public function getPlayer(): PlayerInterface
    {
        return $this->player;
    }

    public function updateRatioAgainst(PlayerInterface $player, int $result): void
    {
        $this->player->updateRatioAgainst($player, $result);
    }

    public function getRatio(): float
    {
        return $this->player->getRatio();
    }

    public function getRange(): int
    {
        return $this->range;
    }

    public function upgradeRange(): void
    {
        $this->range = min($this->range + 1, 40);
    }
}