<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\Fournisseur;
use App\Entity\SousRubrique;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $u1 = new User();
        $u1->setEmail("test@test.com");
        $password = $this->hasher->hashPassword($u1, "1234");
        $u1->setPassword($password);
        $u1->setRoles(["ROLE_USER"]);
        $manager->persist($u1);

        $u2 = new User();
        $u2->setEmail("admin@test.com");
        $password = $this->hasher->hashPassword($u2, "1234");
        $u2->setPassword($password);
        $u2->setRoles(["ROLE_ADMIN"]);
        $manager->persist($u2);


        $f1 = new Fournisseur();
        $f1->setNom("Yamaha");
        $manager->persist($f1);


        $r1 = new Rubrique();
        $r1->setNomRubrique("Guitares");
        $r1->setPhoto(photo: "images/rubriques/guitares.webp");
        $manager->persist($r1);

        $r2 = new Rubrique();
        $r2->setNomRubrique("Claviers");
        $r2->setPhoto("images/rubriques/claviers.jpg");
        $manager->persist($r2);

        $r3 = new Rubrique();
        $r3->setNomRubrique("Instruments à vent");
        $r3->setPhoto("images/rubriques/instrumentsvent.jpg");
        $manager->persist($r3);

        $r4 = new Rubrique();
        $r4->setNomRubrique("Percussions");
        $r4->setPhoto("images/rubriques/batteries.jpg");
        $manager->persist($r4);

        $r5 = new Rubrique();
        $r5->setNomRubrique("Instruments à corde");
        $r5->setPhoto("images/rubriques/classique.jpg");
        $manager->persist($r5);

        $r6 = new Rubrique();
        $r6->setNomRubrique("Electronique");
        $r6->setPhoto("images/rubriques/electronique.jpg");
        $manager->persist($r6);




        $sr1 = new SousRubrique();
        $sr1->setNomSousRubrique("Guitares électriques");
        $sr1->setPhoto(photo: "images/sousrubriques/guitareelectrique.jpg");
        $r1->addSousRubrique($sr1);
        $manager->persist($sr1);

        $sr2 = new SousRubrique();
        $sr2->setNomSousRubrique("Guitares acoustiques");
        $sr2->setPhoto(photo: "images/sousrubriques/guitareacoustique.png");
        $r1->addSousRubrique($sr2);
        $manager->persist($sr2);

        $sr3 = new SousRubrique();
        $sr3->setNomSousRubrique("Guitares classiques");
        $sr3->setPhoto(photo: "images/sousrubriques/guitareclassique.jpg");
        $r1->addSousRubrique($sr3);
        $manager->persist($sr3);






        $sr4 = new SousRubrique();
        $sr4->setNomSousRubrique("Pianos acoustiques");
        $sr4->setPhoto(photo: "images/sousrubriques/pianoacoustique.webp");
        $r2->addSousRubrique($sr4);
        $manager->persist($sr4);

        $sr5 = new SousRubrique();
        $sr5->setNomSousRubrique("Pianos numériques");
        $sr5->setPhoto(photo: "images/sousrubriques/pianonumerique.webp");
        $r2->addSousRubrique($sr5);
        $manager->persist($sr5);

        $sr6 = new SousRubrique();
        $sr6->setNomSousRubrique("Orgues");
        $sr6->setPhoto(photo: "images/sousrubriques/orgues.jpg");
        $r2->addSousRubrique($sr6);
        $manager->persist($sr6);





        $sr7 = new SousRubrique();
        $sr7->setNomSousRubrique("Flutes");
        $sr7->setPhoto(photo: "images/sousrubriques/flutes.jpg");
        $r3->addSousRubrique($sr7);
        $manager->persist($sr7);

        $sr8 = new SousRubrique();
        $sr8->setNomSousRubrique("Trompettes");
        $sr8->setPhoto(photo: "images/sousrubriques/trompettes.jpg");
        $r3->addSousRubrique($sr8);
        $manager->persist($sr8);

        $sr9 = new SousRubrique();
        $sr9->setNomSousRubrique("Trombones");
        $sr9->setPhoto(photo: "images/sousrubriques/trombones.PNG");
        $r3->addSousRubrique($sr9);
        $manager->persist($sr9);

        $sr10 = new SousRubrique();
        $sr10->setNomSousRubrique("Harmonicas");
        $sr10->setPhoto(photo: "images/sousrubriques/harmonicas.jpg");
        $r3->addSousRubrique($sr10);
        $manager->persist($sr10);





        $sr11 = new SousRubrique();
        $sr11->setNomSousRubrique("Batteries");
        $sr11->setPhoto(photo: "images/sousrubriques/batteriess.PNG");
        $r4->addSousRubrique($sr11);
        $manager->persist($sr11);

        $sr12 = new SousRubrique();
        $sr12->setNomSousRubrique("Percussions manuelles");
        $sr12->setPhoto(photo: "images/sousrubriques/percussionmanuelle.PNG");
        $r4->addSousRubrique($sr12);
        $manager->persist($sr12);

        $sr13 = new SousRubrique();
        $sr13->setNomSousRubrique("Percussions mélodiques");
        $sr13->setPhoto(photo: "images/sousrubriques/percussionmelodique.jpg");
        $r4->addSousRubrique($sr13);
        $manager->persist($sr13);





        $sr14 = new SousRubrique();
        $sr14->setNomSousRubrique("Violons");
        $sr14->setPhoto(photo: "images/sousrubriques/violons.jpg");
        $r5->addSousRubrique($sr14);
        $manager->persist($sr14);

        $sr15 = new SousRubrique();
        $sr15->setNomSousRubrique("Violoncelles");
        $sr15->setPhoto(photo: "images/sousrubriques/violoncelle.jpg");
        $r5->addSousRubrique($sr15);
        $manager->persist($sr15);

        $sr16 = new SousRubrique();
        $sr16->setNomSousRubrique("Altos");
        $sr16->setPhoto(photo: "images/sousrubriques/altos.jpg");
        $r5->addSousRubrique($sr16);
        $manager->persist($sr16);

        $sr17 = new SousRubrique();
        $sr17->setNomSousRubrique("Harpes");
        $sr17->setPhoto(photo: "images/sousrubriques/harpes.jpg");
        $r5->addSousRubrique($sr17);
        $manager->persist($sr17);




        $sr18 = new SousRubrique();
        $sr18->setNomSousRubrique("Synthés");
        $sr18->setPhoto(photo: "images/sousrubriques/synthes.PNG");
        $r6->addSousRubrique($sr18);
        $manager->persist($sr18);

        $sr19 = new SousRubrique();
        $sr19->setNomSousRubrique("Keytar");
        $sr19->setPhoto(photo: "images/sousrubriques/keytar.PNG");
        $r6->addSousRubrique($sr19);
        $manager->persist($sr19);

        $sr20 = new SousRubrique();
        $sr20->setNomSousRubrique("Pads");
        $sr20->setPhoto(photo: "images/sousrubriques/pads.PNG");
        $r6->addSousRubrique($sr20);
        $manager->persist($sr20);





        $p1 = new Produit();
        $p1->setLibelleCourt("GIBSON 60s Figured Top Bourbon Burst");
        $p1->setDescription("...");
        $p1->setPrixAchat(2699.99);
        $p1->setPhoto("images/produits/gibson.jpg");
        $sr1->addProduit($p1);
        $f1->addProduit($p1);
        $manager->persist($p1);

        $p2 = new Produit();
        $p2->setLibelleCourt("GES 50 Sunburst Shiver");
        $p2->setDescription("...");
        $p2->setPrixAchat(149.99);
        $p2->setPhoto("images/produits/ges50.jpg");
        $sr1->addProduit($p2);
        $f1->addProduit($p2);
        $manager->persist($p2);

        $p3 = new Produit();
        $p3->setLibelleCourt("G110 Cort Rouge");
        $p3->setDescription("...");
        $p3->setPrixAchat(219.00);
        $p3->setPhoto("images/produits/G110.jpg");
        $sr1->addProduit($p3);
        $f1->addProduit($p3);
        $manager->persist($p3);


        $manager->flush();
    }
}
