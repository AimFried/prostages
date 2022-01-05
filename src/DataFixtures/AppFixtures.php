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
        $stage->setNomLong($titreStage);
        $stage->setNomCourt($missionStage);
        $stage->setNomCourt($mailStage);
        
        $manager->persist($entreprise);

        // Création module Formation
        $formation = new Formation();
        $Formation->setNomLong($nomLongFormation);
        $Formation->setNomCourt($nomCourtFormation);
        
        $manager->persist($formation);

        $nbrEntreprise = 10;
        // Création module Entreprise
        $entreprise = new Entreprise();
        $entreprise->setNomLong($nomEntreprise);
        $entreprise->setNomCourt($adresseEntreprise);
        $entreprise->setNomCourt($activiteEntreprise);
        $entreprise->setNomCourt($siteURLEntreprise);
        
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
