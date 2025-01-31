<?php

class CourseDecorator
{
    
    public static function afficherGrilleDepart(array $participants): void
    {
        // Tri des participants
        usort($participants, function ($a, $b) {
            // 1. Tri par demi-grand axe (plus petite orbite en premier)
            if ($a->getDemiGrandAxe() !== $b->getDemiGrandAxe()) {
                return $a->getDemiGrandAxe() <=> $b->getDemiGrandAxe();
            }
            // 2. Tri par vitesse orbitale (plus grande vitesse en premier)
            if ($a->getVitesse() !== $b->getVitesse()) {
                return $b->getVitesse() <=> $a->getVitesse();
            }
            // 3. Tri par nom (ordre alphanumérique)
            return strcmp($a->getNom(), $b->getNom());
        });

        // Affichage de la grille de départ
        echo "<h2>Grille de départ</h2>";
        foreach ($participants as $index => $participant) {
            $nom = $participant->getNom();
            $classe = strtolower((new ReflectionClass($participant))->getShortName());
            $type = $participant->getType();

            // Accord du déterminant (un/une)
            $determinant = ($classe === 'comete' || $classe === 'planete') ? 'une' : 'un';

            echo "Le " . self::getOrdinal($index + 1) . " participant $nom est $determinant $classe de type $type.<br>";
        }
    }

    
    public static function afficherResultats(array $resultats): void
    {
        echo "<h2>Résultats de la course</h2>";

        // Affichage des trois premiers
        for ($i = 0; $i < 3; $i++) {
            if (!isset($resultats[$i])) {
                break; // Moins de trois participants
            }

            $participant = $resultats[$i]['corpsCeleste'];
            $orbites = $resultats[$i]['orbites'];
            $nom = $participant->getNom();
            $classe = strtolower((new ReflectionClass($participant))->getShortName());
            $type = $participant->getType();

            // Accord du déterminant (un/une)
            $determinant = ($classe === 'comete' || $classe === 'planete') ? 'une' : 'un';

            // Phrases spécifiques pour chaque position
            switch ($i) {
                case 0:
                    echo "Le vainqueur de la course est $determinant $classe de type $type, le grand $nom, il a effectué " . round($orbites, 2) . " tours d'orbite.<br>";
                    break;
                case 1:
                    echo "Le lauréat de la médaille d'argent est $determinant $classe de type $type, le non moins talentueux $nom, il a effectué " . round($orbites, 2) . " tours d'orbite.<br>";
                    break;
                case 2:
                    echo "Le troisième candidat présent sur le podium est $determinant $classe de type $type, le vénérable $nom, il a effectué " . round($orbites, 2) . " tours d'orbite.<br>";
                    break;
            }
        }
    }

    
    private static function getOrdinal(int $number): string
    {
        if ($number === 1) {
            return $number . "er";
        }
        return $number . "e";
    }
}