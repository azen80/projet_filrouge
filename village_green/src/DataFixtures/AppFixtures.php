<?php

namespace App\DataFixtures;

use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $f1 = new Fournisseur();
        $f1->setNom("Yamaha");
        $manager->persist($f1);


        $r1 = new Rubrique();
        $r1->setNomRubrique("Guitares");
        $r1->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r1);

        $r2 = new Rubrique();
        $r2->setNomRubrique("Claviers");
        $r2->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r2);

        $r3 = new Rubrique();
        $r3->setNomRubrique("Pianos");
        $r3->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r3);

        $r4 = new Rubrique();
        $r4->setNomRubrique("Flutes");
        $r4->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r4);

        $r5 = new Rubrique();
        $r5->setNomRubrique("Batteries");
        $r5->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r5);

        $r6 = new Rubrique();
        $r6->setNomRubrique("Accordéons");
        $r6->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r6);

        $r7 = new Rubrique();
        $r7->setNomRubrique("Harmonica");
        $r7->setPhoto("https://picsum.photos/200/300");
        $manager->persist($r7);




        $sr1 = new SousRubrique();
        $sr1->setNomSousRubrique("Guitares électriques");
        $r1->addSousRubrique($sr1);
        $manager->persist($sr1);

        $sr2 = new SousRubrique();
        $sr2->setNomSousRubrique("Guitares classiques");
        $r1->addSousRubrique($sr2);
        $manager->persist($sr2);

        $sr3 = new SousRubrique();
        $sr3->setNomSousRubrique("Guitares folk");
        $r1->addSousRubrique($sr3);
        $manager->persist($sr3);


        $p1 = new Produit();
        $p1->setLibelleCourt("Guitare qui brille");
        $p1->setDescription("...");
        $p1->setPrixAchat(12.45);
        $sr1->addProduit($p1);
        $f1->addProduit($p1);
        $manager->persist($p1);



        $manager->flush();
    }
}
