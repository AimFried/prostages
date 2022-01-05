<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FORMATION;
use App\Entity\ENTREPRISE;
use App\Entity\STAGE;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un générateur de données avec la librairie Faker
        $faker = \Faker\Factory::create('fr_FR');

        $nbrStage = 15;
        // Création module Stage
        $stage = new Stage();
        $stage->setTitre($faker->sentence($nbWords = 6, $variableNbWords = true));
        $stage->setMission($faker->realText($maxNbChars = 200, $indexSize = 2));
        $stage->setMail($mailStage);
        
        $manager->persist($entreprise);

        // Création module Formation
        $formation = new Formation();
        $Formation->setNomLong($nomLongFormation);
        $Formation->setNomCourt($nomCourtFormation);
        
        $manager->persist($formation);

        $nbrEntreprise = 10;
        // Création module Entreprise
        $entreprise = new Entreprise();
        $entreprise->setNom($nomEntreprise);
        $entreprise->setAdresse($adresseEntreprise);
        $entreprise->setActivite($activiteEntreprise);
        $entreprise->setSiteURL($fake->url);
        
        $manager->persist($entreprise);


        /*****************************
         ***  LISTE DES FORMATIONS ***
         *****************************/
        $formationListe = array(
            //INFORMATIQUE
            "DUT INFO" => "Diplôme Universitaire Technologique - Informatique",
            "LP PROG " => "Licence Professionels - Programmation Avancee",
            "LP NUM" => "Licence Professionnels - Numérique"
            );


        
        //Envoi des objets crées en base de données
        $manager->flush();
    }
}
