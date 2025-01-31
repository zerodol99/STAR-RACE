<?php

class CorpsCelesteFactory
{
    public static function creerCorpsCelesteAleatoire(): CorpsCeleste
    {
        $types = ['Planete', 'Asteroide', 'Comete', 'PlaneteNaine'];
        $type = $types[array_rand($types)];

        $masse = mt_rand(0, 100) / 100;
        $diametre = mt_rand(1, 100000);
        $demiGrandAxe = mt_rand(1, 1000);
        $vitesse = mt_rand(10, 100);
        $nom = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8);

        switch ($type) {
            case 'Planete':
                $typePlanete = ['liquide', 'solide', 'gazeux'][array_rand(['liquide', 'solide', 'gazeux'])];
                return new Planete($masse, $diametre, $demiGrandAxe, $vitesse, $nom, $typePlanete);
            case 'Asteroide':
                return new Asteroide($masse, $diametre, $demiGrandAxe, $vitesse, $nom);
            case 'Comete':
                return new Comete($masse, $diametre, $demiGrandAxe, $vitesse, $nom);
            case 'PlaneteNaine':
                $typePlaneteNaine = ['liquide', 'solide', 'gazeux'][array_rand(['liquide', 'solide', 'gazeux'])];
                return new PlaneteNaine($masse, $diametre, $demiGrandAxe, $vitesse, $nom, $typePlaneteNaine);
        }
    }
}