<?php
declare(strict_types=1);

require_once "./Class/Player.php";
require_once "./Class/Lobby.php";
require_once "./Class/BlitzPlayer.php";

$greg = new Player('greg', 400);
$jade = new Player('jade', 476);

$lobby = new Lobby;
$lobby->addPlayers($greg, $jade);

$blitz = new BlitzPlayer(ratio:$greg);

var_dump($blitz->getRatio());
// var_dump($lobby->findOponents($lobby->queuingPlayers[0]));