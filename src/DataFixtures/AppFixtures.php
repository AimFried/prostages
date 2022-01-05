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

        // Création des différentes formations
        $dutInfo = new Formation();
        $dutInfo->setNomLong("DUT Informatique");
        $dutInfo->setNomCourt("DUT Info");

        $dutInfoImagNum = new Formation();
        $dutInfoImagNum->setNomLong("DUT Informatique et Imagerie Numérique");
        $dutInfoImagNum->setNomCourt("DUT IIM");

        $dutGea = new Formation();
        $dutGea->setNomLong("DUT Gestion des entreprises et des administrations");
        $dutGea->setNomCourt("DUT GEA");

        $lpProg = new Formation();
        $lpProg->setNomLong("Licence programmation");
        $lpProg->setNomCourt("LP");

        $dutGenieLogiciel = new Formation();
        $dutGenieLogiciel->setNomLong("DUT Genie Logiciel");
        $dutGenieLogiciel->setNomCourt("DUT GL");


        $tableauFormations=array($dutInfo, $dutInfoImagNum, $dutGea, $lpProg, $dutGenieLogiciel);

        //Enregistrement et vérification des formations
        foreach($tableauFormations as $formation)
        {
            $manager->persist($formation);
        }

        //Création de 15 entreprises
        for($i = 0; $i < 16 ; $i++)
        {
            // Création module Entreprise
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setAdresse($faker->address);
            $entreprise->setActivite($faker->sentence($nbWords = 1, $variableNbWords = true));
            $entreprise->setURLsite($faker->url);
            
            $entreprises[] = $entreprise; 
            $manager->persist($entreprise);                       
        }
           
         //Création de 15 stages
        for($i = 0 ; $i < 16 ; $i++)
        {
            $entrepriseAssocieAuStage = $faker->numberBetween($min=0, $max=14);
            $formationAssocieAuStage = $faker->numberBetween($min=0, $max=4);

            // Création module Stage
            $stage = new Stage();
            $stage->setTitre($faker->realText(50,2));
            $stage->setMission($faker->realText(200,2));
            $stage->setEmail($faker->email);
            $stage->setEntreprise($entreprises[$entrepriseAssocieAuStage]);
            $stage->addFormation($tableauFormations[$formationAssocieAuStage]);
            $manager->persist($stage);               
        }
        
        //Envoi des objets crées en base de données
        $manager->flush();
    }
}
