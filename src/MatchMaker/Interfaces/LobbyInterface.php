<?php

namespace App\MatchMaker\Interfaces;


use App\MatchMaker\Player\QueuingPlayer;

interface LobbyInterface 
{
    public function isInLobby(PlayerInterface $player): QueuingPlayer;

    public function isPlaying(PlayerInterface $player): bool;

    public function removePlayer(PlayerInterface $player): void;

    public function addPlayer(PlayerInterface $player): void;

    public function createEncounterForPlayer(InLobbyPlayerInterface $player): void;

    public function createEncounters(): void;
}