<?php

class Course
{
    private array $participants = [];
    private int $duree;

    public function __construct(int $duree)
    {
        $this->duree = $duree;
    }

    public function ajouterParticipant(CorpsCeleste $corpsCeleste): void
    {
        $this->participants[] = $corpsCeleste;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function demarrerCourse(): array
    {
        $resultats = [];
        foreach ($this->participants as $participant) {
            $orbites = $participant->calculerOrbite($this->duree);
            $resultats[] = [
                'corpsCeleste' => $participant,
                'orbites' => $orbites
            ];
        }

        // Tri des résultats par nombre d'orbites décroissant
        usort($resultats, fn($a, $b) => $b['orbites'] <=> $a['orbites']);

        return $resultats;
    }
}