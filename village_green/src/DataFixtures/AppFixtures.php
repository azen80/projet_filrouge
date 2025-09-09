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


        $f2 = new Fournisseur();
        $f2->SetNom("Hohner");
        $manager->persist($f2);


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




        #guitares électriques
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


        #guitares acoustiques
        $p4 = new Produit();
        $p4->setLibelleCourt("SD25 Prodipe");
        $p4->setDescription("...");
        $p4->setPrixAchat(189.00);
        $p4->setPhoto("images/produits/SD25.png");
        $sr2->addProduit($p4);
        $f1->addProduit($p4);
        $manager->persist($p4);

        $p5 = new Produit();
        $p5->setLibelleCourt("CGS102AII Yamaha");
        $p5->setDescription("...");
        $p5->setPrixAchat(139.00);
        $p5->setPhoto("images/produits/CGS102AII.jpg");
        $sr2->addProduit($p5);
        $f1->addProduit($p5);
        $manager->persist($p5);

        $p6 = new Produit();
        $p6->setLibelleCourt("CD-60 V2 Fender");
        $p6->setDescription("...");
        $p6->setPrixAchat(150.00);
        $p6->setPhoto("images/produits/CD-60.jpg");
        $sr2->addProduit($p6);
        $f1->addProduit($p6);
        $manager->persist($p6);


        #guitares classiques
        $p7 = new Produit();
        $p7->setLibelleCourt("VC204 Valencia");
        $p7->setDescription("...");
        $p7->setPrixAchat(99.00);
        $p7->setPhoto("images/produits/VC204.jpg");
        $sr3->addProduit($p7);
        $f1->addProduit($p7);
        $manager->persist($p7);

        $p8 = new Produit();
        $p8->setLibelleCourt("CUENCA 5");
        $p8->setDescription("...");
        $p8->setPrixAchat(319.00);
        $p8->setPhoto("images/produits/cuenca.jpg");
        $sr3->addProduit($p8);
        $f1->addProduit($p8);
        $manager->persist($p8);

        $p9 = new Produit();
        $p9->setLibelleCourt("C40 III Yamaha");
        $p9->setDescription("...");
        $p9->setPrixAchat(149.00);
        $p9->setPhoto("images/produits/C40.jpg");
        $sr3->addProduit($p9);
        $f1->addProduit($p9);
        $manager->persist($p9);



        # piano acoustique
        $p10 = new Produit();
        $p10->setLibelleCourt("Yamaha B2");
        $p10->setDescription("...");
        $p10->setPrixAchat(5290.00);
        $p10->setPhoto("images/produits/pianoacou1.webp");
        $sr4->addProduit($p10);
        $f1->addProduit($p10);
        $manager->persist($p10);

        $p11 = new Produit();
        $p11->setLibelleCourt("SHIGERU KAWAI SK2");
        $p11->setDescription("...");
        $p11->setPrixAchat(48990.00);
        $p11->setPhoto("images/produits/pianoacou2.jpg");
        $sr4->addProduit($p11);
        $f1->addProduit($p11);
        $manager->persist($p11);

        $p12 = new Produit();
        $p12->setLibelleCourt("PLEYEL DROIT P120-BLK");
        $p12->setDescription("...");
        $p12->setPrixAchat(8990.00);
        $p12->setPhoto("images/produits/pianoacou3.jpg");
        $sr4->addProduit($p12);
        $f1->addProduit($p12);
        $manager->persist($p12);



        #piano numérique
        $p13 = new Produit();
        $p13->setLibelleCourt("KORG B2");
        $p13->setDescription("...");
        $p13->setPrixAchat(415.00);
        $p13->setPhoto("images/produits/pianonum1.jpg");
        $sr5->addProduit($p13);
        $f1->addProduit($p13);
        $manager->persist($p13);

        $p14 = new Produit();
        $p14->setLibelleCourt("OURA S100");
        $p14->setDescription("...");
        $p14->setPrixAchat(459.99);
        $p14->setPhoto("images/produits/pianonum2.webp");
        $sr5->addProduit($p14);
        $f1->addProduit($p14);
        $manager->persist($p14);

        $p15 = new Produit();
        $p15->setLibelleCourt("ROLAND GP3");
        $p15->setDescription("...");
        $p15->setPrixAchat(3190.00);
        $p15->setPhoto("images/produits/pianonum3.jpg");
        $sr5->addProduit($p15);
        $f1->addProduit($p15);
        $manager->persist($p15);




        #orgues
        $p16 = new Produit();
        $p16->setLibelleCourt("Johannus Studio 260");
        $p16->setDescription("...");
        $p16->setPrixAchat(5979.00);
        $p16->setPhoto("images/produits/orgue1.jpg");
        $sr6->addProduit($p16);
        $f1->addProduit($p16);
        $manager->persist($p16);

        $p17 = new Produit();
        $p17->setLibelleCourt("Viscount Unico CLV 8 Konkav");
        $p17->setDescription("...");
        $p17->setPrixAchat(15690.00);
        $p17->setPhoto("images/produits/orgue2.jpg");
        $sr6->addProduit($p17);
        $f1->addProduit($p17);
        $manager->persist($p17);

        $p18 = new Produit();
        $p18->setLibelleCourt("Viscount Chorum 10");
        $p18->setDescription("...");
        $p18->setPrixAchat(3555.00);
        $p18->setPhoto("images/produits/orgue3.jpg");
        $sr6->addProduit($p18);
        $f1->addProduit($p18);
        $manager->persist($p18);





        #flutes
        $p19 = new Produit();
        $p19->setLibelleCourt("YAMAHA YRA 302BIII");
        $p19->setDescription("...");
        $p19->setPrixAchat(45.00);
        $p19->setPhoto("images/produits/flute1.jpg");
        $sr7->addProduit($p19);
        $f1->addProduit($p19);
        $manager->persist($p19);

        $p20 = new Produit();
        $p20->setLibelleCourt("MIYAZAWA PB202-R");
        $p20->setDescription("...");
        $p20->setPrixAchat(3259.00);
        $p20->setPhoto("images/produits/flute2.jpg");
        $sr7->addProduit($p20);
        $f1->addProduit($p20);
        $manager->persist($p20);

        $p21 = new Produit();
        $p21->setLibelleCourt("MOECK ROTTENBURGH 4208");
        $p21->setDescription("...");
        $p21->setPrixAchat(475.00);
        $p21->setPhoto("images/produits/flute3.jpg");
        $sr7->addProduit($p21);
        $f1->addProduit($p21);
        $manager->persist($p21);




        #trompettes
        $p22 = new Produit();
        $p22->setLibelleCourt("YAMAHA YTR 3335");
        $p22->setDescription("...");
        $p22->setPrixAchat(829.00);
        $p22->setPhoto("images/produits/trompette1.jpg");
        $sr8->addProduit($p22);
        $f1->addProduit($p22);
        $manager->persist($p22);

        $p23 = new Produit();
        $p23->setLibelleCourt("SML TP50");
        $p23->setDescription("...");
        $p23->setPrixAchat(339.00);
        $p23->setPhoto("images/produits/trompette2.png");
        $sr8->addProduit($p23);
        $f1->addProduit($p23);
        $manager->persist($p23);

        $p24 = new Produit();
        $p24->setLibelleCourt("JUPITER JTR701Q");
        $p24->setDescription("...");
        $p24->setPrixAchat(598.00);
        $p24->setPhoto("images/produits/trompette3.jpg");
        $sr8->addProduit($p24);
        $f1->addProduit($p24);
        $manager->persist($p24);




        #trombones
        $p25 = new Produit();
        $p25->setLibelleCourt("ZAMASS");
        $p25->setDescription("...");
        $p25->setPrixAchat(4152.84);
        $p25->setPhoto("images/produits/trombone1.jpg");
        $sr9->addProduit($p25);
        $f1->addProduit($p25);
        $manager->persist($p25);

        $p26 = new Produit();
        $p26->setLibelleCourt("XENO YSL-882 O");
        $p26->setDescription("...");
        $p26->setPrixAchat(4419.00);
        $p26->setPhoto("images/produits/trombone2.jpg");
        $sr9->addProduit($p26);
        $f1->addProduit($p26);
        $manager->persist($p26);

        $p27 = new Produit();
        $p27->setLibelleCourt("EASTMAN ETB 420");
        $p27->setDescription("...");
        $p27->setPrixAchat(735.54);
        $p27->setPhoto("images/produits/trombone3.jpg");
        $sr9->addProduit($p27);
        $f1->addProduit($p27);
        $manager->persist($p27);






        #harmonicas
        $p28 = new Produit();
        $p28->setLibelleCourt("Hohner Chromonica 12");
        $p28->setDescription("...");
        $p28->setPrixAchat(229.50);
        $p28->setPhoto("images/produits/harmonica1.jpg");
        $sr10->addProduit($p28);
        $f2->addProduit($p28);
        $manager->persist($p28);

        $p29 = new Produit();
        $p29->setLibelleCourt("Hohner Amadeus 12");
        $p29->setDescription("...");
        $p29->setPrixAchat(1100.00);
        $p29->setPhoto("images/produits/harmonica2.jpg");
        $sr10->addProduit($p29);
        $f2->addProduit($p29);
        $manager->persist($p29);

        $p30 = new Produit();
        $p30->setLibelleCourt("Hohner Marine Band 10");
        $p30->setDescription("...");
        $p30->setPrixAchat(37.00);
        $p30->setPhoto("images/produits/harmonica3.jpg");
        $sr10->addProduit($p30);
        $f2->addProduit($p30);
        $manager->persist($p30);

        



        #batteries
        $p31 = new Produit();
        $p31->setLibelleCourt("KESHUO");
        $p31->setDescription("...");
        $p31->setPrixAchat(3927.62);
        $p31->setPhoto("images/produits/batterie1.jpg");
        $sr11->addProduit($p31);
        $f1->addProduit($p31);
        $manager->persist($p31);

        $p32 = new Produit();
        $p32->setLibelleCourt("PEARL export");
        $p32->setDescription("...");
        $p32->setPrixAchat(1089.00);
        $p32->setPhoto("images/produits/batterie2.jpg");
        $sr11->addProduit($p32);
        $f1->addProduit($p32);
        $manager->persist($p32);

        $p33 = new Produit();
        $p33->setLibelleCourt("Yamaha Rydeen Standard");
        $p33->setDescription("...");
        $p33->setPrixAchat(879.00);
        $p33->setPhoto("images/produits/batterie3.jpg");
        $sr11->addProduit($p33);
        $f1->addProduit($p33);
        $manager->persist($p33);




        #percussion manuelle
        $p34 = new Produit();
        $p34->setLibelleCourt("Bongo Aspire LPA601");
        $p34->setDescription("...");
        $p34->setPrixAchat(162.00);
        $p34->setPhoto("images/produits/percumanu1.jpg");
        $sr12->addProduit($p34);
        $f1->addProduit($p34);
        $manager->persist($p34);

        $p35 = new Produit();
        $p35->setLibelleCourt("Bongo WB100DX:523");
        $p35->setDescription("...");
        $p35->setPrixAchat(270.00);
        $p35->setPhoto("images/produits/percumanu2.jpg");
        $sr12->addProduit($p35);
        $f1->addProduit($p35);
        $manager->persist($p35);

        $p36 = new Produit();
        $p36->setLibelleCourt("Pearl PWC-302DX");
        $p36->setDescription("...");
        $p36->setPrixAchat(775.00);
        $p36->setPhoto("images/produits/percumanu3.jpg");
        $sr12->addProduit($p36);
        $f1->addProduit($p36);
        $manager->persist($p36);





        #percussion mélodique
        $p37 = new Produit();
        $p37->setLibelleCourt("Thomann THM3.0 Marimba");
        $p37->setDescription("...");
        $p37->setPrixAchat(498.00);
        $p37->setPhoto("images/produits/percumelo1.jpg");
        $sr13->addProduit($p37);
        $f1->addProduit($p37);
        $manager->persist($p37);

        $p38 = new Produit();
        $p38->setLibelleCourt("Thomann MSPVT43 Marimba");
        $p38->setDescription("...");
        $p38->setPrixAchat(2898.00);
        $p38->setPhoto("images/produits/percumelo2.jpg");
        $sr13->addProduit($p38);
        $f1->addProduit($p38);
        $manager->persist($p38);

        $p39 = new Produit();
        $p39->setLibelleCourt("Goldon Alto Xylophone 10210");
        $p39->setDescription("...");
        $p39->setPrixAchat(294.00);
        $p39->setPhoto("images/produits/percumelo3.jpg");
        $sr13->addProduit($p39);
        $f1->addProduit($p39);
        $manager->persist($p39);






        #violons
        $p40 = new Produit();
        $p40->setLibelleCourt("Stentor SR1500");
        $p40->setDescription("...");
        $p40->setPrixAchat(229.00);
        $p40->setPhoto("images/produits/violon1.jpg");
        $sr14->addProduit($p40);
        $f1->addProduit($p40);
        $manager->persist($p40);

        $p41 = new Produit();
        $p41->setLibelleCourt("Roth & Junius RJV-A");
        $p41->setDescription("...");
        $p41->setPrixAchat(226.00);
        $p41->setPhoto("images/produits/violon2.jpg");
        $sr14->addProduit($p41);
        $f1->addProduit($p41);
        $manager->persist($p41);

        $p42 = new Produit();
        $p42->setLibelleCourt("Karl Hôfner Presto 4/4");
        $p42->setDescription("...");
        $p42->setPrixAchat(1066.00);
        $p42->setPhoto("images/produits/violon3.jpg");
        $sr14->addProduit($p42);
        $f1->addProduit($p42);
        $manager->persist($p42);




        #violoncelle
        $p43 = new Produit();
        $p43->setLibelleCourt("Luca Zerilli Cello");
        $p43->setDescription("...");
        $p43->setPrixAchat(23590.00);
        $p43->setPhoto("images/produits/violoncelle1.jpg");
        $sr15->addProduit($p43);
        $f1->addProduit($p43);
        $manager->persist($p43);

        $p44 = new Produit();
        $p44->setLibelleCourt("Stentor SR1108 Cello");
        $p44->setDescription("...");
        $p44->setPrixAchat(869.00);
        $p44->setPhoto("images/produits/violoncelle2.jpg");
        $sr15->addProduit($p44);
        $f1->addProduit($p44);
        $manager->persist($p44);

        $p45 = new Produit();
        $p45->setLibelleCourt("Roth & Junius Europ Cello");
        $p45->setDescription("...");
        $p45->setPrixAchat(1269.00);
        $p45->setPhoto("images/produits/violoncelle3.jpg");
        $sr15->addProduit($p45);
        $f1->addProduit($p45);
        $manager->persist($p45);






        #alto
        $p46 = new Produit();
        $p46->setLibelleCourt("Thomann Sudent Pro Viola 15");
        $p46->setDescription("...");
        $p46->setPrixAchat(159.00);
        $p46->setPhoto("images/produits/alto1.jpg");
        $sr16->addProduit($p46);
        $f1->addProduit($p46);
        $manager->persist($p46);

        $p47 = new Produit();
        $p47->setLibelleCourt("Gewa Germania Viola 16.5");
        $p47->setDescription("...");
        $p47->setPrixAchat(1298.00);
        $p47->setPhoto("images/produits/alto2.jpg");
        $sr16->addProduit($p47);
        $f1->addProduit($p47);
        $manager->persist($p47);

        $p48 = new Produit();
        $p48->setLibelleCourt("Yamaha VA5S Alto 16");
        $p48->setDescription("...");
        $p48->setPrixAchat(595.00);
        $p48->setPhoto("images/produits/alto3.png");
        $sr16->addProduit($p48);
        $f1->addProduit($p48);
        $manager->persist($p48);

        $manager->flush();
    }
}
