<?php
declare(strict_types=1);

spl_autoload_register(function($class){
    $path = str_replace(['App', '\\'],['src', '/'], $class.'.php');

    if(file_exists($path)){
        require $path;
    }
});

use App\MatchMaker\Player\Player;
use App\MatchMaker\Lobby;
use App\MatchMaker\Encounter\Score;


try {
    $greg = new Player('greg');
    $chuckNorris = new Player('Chuck Norris', 3000);

    $lobby = new Lobby();
    $lobby->addPlayer($greg);
    $lobby->addPlayer($chuckNorris);

    while (count($lobby->queuingPlayers)) {
        $lobby->createEncounters();
    }

    $encounter = end($lobby->encounters);

    // ces scores sont fictifs !
    $encounter->setScores(
        new Score(score: 42, player: $greg),
        new Score(score: 1, player: $chuckNorris)
    );

    var_dump($encounter);

    $encounter->updateRatios();

    var_dump($greg);
    var_dump($chuckNorris);

} catch (Exception $e) {
    echo $e->getMessage();
}



