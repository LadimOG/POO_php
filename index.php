<?php
declare(strict_types=1);

spl_autoload_register(function($class){
    $path = str_replace(['App', '\\'],['src', '/'], $class.'.php');

    if(file_exists($path)){
        require_once $path;
    }
});


use App\MatchMaker\Player\BlitzPlayer;
use App\MatchMaker\Player\Player;
use App\MatchMaker\Lobby;

$greg = new Player('greg', 400);
$jade = new Player('jade', 476);

$lobby = new Lobby;
$lobby->addPlayers($greg, $jade);

$blitz = new BlitzPlayer();

var_dump($blitz->fqcn(). PHP_EOL);
var_dump($lobby->findOponents($lobby->queuingPlayers[0]));