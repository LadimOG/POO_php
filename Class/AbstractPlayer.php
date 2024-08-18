<?php

abstract class AbstractPlayer
{
    public function __construct(protected string $name = "user", protected float $ratio = 400.0)
    {
        
    }
    abstract public function getName(): string ;

    abstract public function getRatio(): float;

    abstract protected function probabilityAgainst(self $player): float;

    abstract public function updateRatioAgainst(self $player, int $result): void;


}