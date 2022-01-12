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

        ///---------CREATION FORMATIONS-----------

        //Formation DUT Informatique
        $dutInfo = new Formation();
        $dutInfo->setNomLong("DUT Informatique");
        $dutInfo->setNomCourt("DUT Info");

        //Formation DUT Informatique et Imagerie Numérique
        $dutInfoImagNum = new Formation();
        $dutInfoImagNum->setNomLong("DUT Informatique et Imagerie Numérique");
        $dutInfoImagNum->setNomCourt("DUT IIM");

        //Formation DUT Gestion des entreprises et des administrations
        $dutGea = new Formation();
        $dutGea->setNomLong("DUT Gestion des entreprises et des administrations");
        $dutGea->setNomCourt("DUT GEA");

        //Formation Licence programmation
        $lpProg = new Formation();
        $lpProg->setNomLong("Licence programmation");
        $lpProg->setNomCourt("LP");

        //Formation DUT Génie Logiciel
        $dutGenieLogiciel = new Formation();
        $dutGenieLogiciel->setNomLong("DUT Genie Logiciel");
        $dutGenieLogiciel->setNomCourt("DUT GL");

        //Insertion des différents formations dans un tableau
        $tableauFormations=array($dutInfo, $dutInfoImagNum, $dutGea, $lpProg, $dutGenieLogiciel);

        //Enregistrement et vérification des formations
        foreach($tableauFormations as $formation)
        {
            $manager->persist($formation);
        }

        ///----------- CREATION DE 15 ENTREPRISES --------
        // Activité d'entreprise a attribuer de façon aléatoire
        $tabActivite = array('Développement web', 'Développement mobile', 'Développement logiciel', 'Maintenance informatique', 'Administration réseaux', 'Analyse de données', 'Métallurgie',"Multimédia", "Électronique");
        for($i = 0; $i < 16 ; $i++)
        {
            // Création module Entreprise
            $entreprise = new Entreprise();
            $numEntreprise =  $faker->numberBetween($min=0, $max=8);
            $entreprise->setNom($faker->company);
            $entreprise->setAdresse($faker->address);
            $entreprise->setActivite($tabActivite[$numEntreprise]);
            $entreprise->setURLsite($faker->url);
            $entreprises[] = $entreprise; 

            //Enregistrement de l'entreprise générée
            $manager->persist($entreprise);                       
        }
           
         ///------------ CREATION DE 15 STAGES ---------
        for($i = 0 ; $i < 16 ; $i++)
        {
            $entrepriseAssocieAuStage = $faker->numberBetween($min=0, $max=14);
            $formationAssocieAuStage = $faker->numberBetween($min=0, $max=4);

            // Création module Stage
            $stage = new Stage();
            $stage->setTitre($faker->jobTitle);
            $stage->setMission($faker->realText(200,2));
            $stage->setEmail($faker->email);
            $stage->setEntreprise($entreprises[$entrepriseAssocieAuStage]);
            $stage->addFormation($tableauFormations[$formationAssocieAuStage]);

            //Enregistrement du stage générée
            $manager->persist($stage);               
        }
        
        //Envoi de tous les objets générer (formations, entreprises et stages) dans la base de données
        $manager->flush();
    }
}
