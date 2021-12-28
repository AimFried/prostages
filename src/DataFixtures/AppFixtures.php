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
        $formationDUT = new Formation();
        $formationDUT->setNomLong("");
        $formationDUT->setNomCourt("BAC +2");
        $formationDUT->setNomLong("");
        $formationDUT->setNomCourt("BAC +3");

        $entreprise = new Entreprise();


        $manager->persist($formationDUT);

        $manager->flush();
    }
}
