<?php
namespace App\MatchMaker;

use App\MatchMaker\Interfaces\LobbyInterface;
use App\MatchMaker\Player\QueuingPlayer;
use App\MatchMaker\Player\Player;



class Lobby implements LobbyInterface
{

    public array $queuingPlayers = [];

    public function findOponents(QueuingPlayer $player): array
    {
        $minLevel = round($player->getRatio() / 100);
        $maxLevel = $minLevel + $player->getRange();

        return array_filter($this->queuingPlayers, static function (QueuingPlayer $potentialOponent) use ($minLevel, $maxLevel, $player) {
            $playerLevel = round($potentialOponent->getRatio() / 100);

            return $player !== $potentialOponent && ($minLevel <= $playerLevel) && ($playerLevel <= $maxLevel);
        });
    }

    public function addPlayer(Player $player): void
    {
        $this->queuingPlayers[] = new QueuingPlayer($player);
    }

    public function addPlayers(Player ...$players): void
    {
        foreach ($players as $player) {
            $this->addPlayer($player);
        }
    }
}