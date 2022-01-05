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

        /*****************************
         ***  LISTE DES FORMATIONS ***
         *****************************/
        $formationListe = array(
            //Liste des formations informatique
            "DUT INFO" => "Diplôme Universitaire Technologique - Informatique",
            "LP PROG " => "Licence Professionels - Programmation Avancee",
            "LP NUM" => "Licence Professionnels - Numérique"
            );

        foreach($formationListe as $nomCourtFormation => $nomLongFormation)
        {
            // Création module Formation
            $formation = new Formation();
            $formation->setNomLong($nomLongFormation);
            $formation->setNomCourt($nomCourtFormation);
            
            //Création de 15 stages
            for($j = 0 ; $j < 16 ; $j++)
            {
                // Création module Stage
                $stage = new Stage();
                $stage->setTitre($faker->sentence($nbWords = 6, $variableNbWords = true));
                $stage->setMission($faker->realText($maxNbChars = 200, $indexSize = 2));
                $stage->setEmail($faker->email);
                
                //Relation entre Formation et Stage
               $stage->addFormation($formation);

               $numEntreprise = $faker->numberBetween($min =0,$max=19);
               $stage->setEntreprise($entreprise[$numEntreprise]);
               $entreprise[$numEntreprise]->addStage($stage);

                $manager->persist($stage);
                $manager->persist($entreprise[$numEntreprise]);
            }
            $manager->persist($formation);
        }
        //Envoi des objets crées en base de données
        $manager->flush();
    }
}
