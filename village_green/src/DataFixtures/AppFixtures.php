<?php

namespace App\DataFixtures;

use App\Entity\Rubrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $r1 = new Rubrique();
        $r1->setNomRubrique("Guitares");
        $manager->persist($r1);


        $r2 = new Rubrique();
        $r2->setNomRubrique("Claviers");
        $manager->persist($r2);


        $manager->flush();
    }
}
