<?php

abstract class CorpsCeleste
{
    protected float $masse;
    protected int $diametre;
    protected int $demiGrandAxe;
    protected float $vitesse;
    protected string $nom;
    protected string $type;

    public function __construct(
        float $masse,
        int $diametre,
        int $demiGrandAxe,
        float $vitesse,
        string $nom,
        string $type
    ) {
        $this->masse = $masse;
        $this->diametre = $diametre;
        $this->demiGrandAxe = $demiGrandAxe;
        $this->vitesse = $vitesse;
        $this->nom = $nom;
        $this->type = $type;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDemiGrandAxe(): int
    {
        return $this->demiGrandAxe;
    }

    public function getVitesse(): float
    {
        return $this->vitesse;
    }

    abstract public function getDescription(): string;

    public function calculerOrbite(float $duree): float
    {
        // Calcul de la fraction de l'orbite parcourue
        return ($this->vitesse * $duree) / (2 * pi() * $this->demiGrandAxe);
    }
}