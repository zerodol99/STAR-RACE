<?php

class Comete extends CorpsCeleste
{
    public function __construct(
        float $masse,
        int $diametre,
        int $demiGrandAxe,
        float $vitesse,
        string $nom
    ) {
        parent::__construct($masse, $diametre, $demiGrandAxe, $vitesse, $nom, 'solide');
    }

    public function getDescription(): string
    {
        return "Comète {$this->nom}";
    }
}