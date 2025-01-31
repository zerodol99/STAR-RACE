<?php

class PlaneteNaine extends CorpsCeleste
{
    public function __construct(
        float $masse,
        int $diametre,
        int $demiGrandAxe,
        float $vitesse,
        string $nom,
        string $type
    ) {
        parent::__construct($masse, $diametre, $demiGrandAxe, $vitesse, $nom, $type);
    }

    public function getDescription(): string
    {
        return "Planète naine {$this->nom} de type {$this->type}";
    }
}