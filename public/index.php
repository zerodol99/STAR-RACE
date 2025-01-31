<?php

require_once __DIR__ . '/../src/CorpsCeleste.php';
require_once __DIR__ . '/../src/Planete.php';
require_once __DIR__ . '/../src/Asteroide.php';
require_once __DIR__ . '/../src/Comete.php';
require_once __DIR__ . '/../src/PlaneteNaine.php';
require_once __DIR__ . '/../src/Course.php';
require_once __DIR__ . '/../src/CorpsCelesteFactory.php';
require_once __DIR__ . '/../src/CourseDecorator.php';

// Création de la course
$course = new Course(mt_rand(1, 100));

// Ajout de 10 participants aléatoires
for ($i = 0; $i < 10; $i++) {
    $course->ajouterParticipant(CorpsCelesteFactory::creerCorpsCelesteAleatoire());
}

// Affichage de la grille de départ
$participants = $course->getParticipants();
echo CourseDecorator::afficherGrilleDepart($participants);

// Démarrage de la course et affichage des résultats
$resultats = $course->demarrerCourse();
echo CourseDecorator::afficherResultats($resultats);