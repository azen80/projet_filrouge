<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use App\Repository\RubriqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function accueil(RubriqueRepository $repo): Response
    {
        $rubriques = $repo->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            "rubriques" => $rubriques
        ]);
    }


    #[Route('/rubrique/{rubrique}', name: 'app_rubrique')]
    public function rubrique(Rubrique $rubrique): Response
    {
        // dd($rubrique);

        return $this->render('accueil/rubrique.html.twig', [
            'controller_name' => 'AccueilController',
            'rubrique' => $rubrique
        ]);
    }


     #[Route('/produits/{sousRubrique}', name: 'app_produits')]
    public function produits(SousRubrique $sousRubrique): Response
    {

        return $this->render('accueil/produits.html.twig', [
            'controller_name' => 'AccueilController',
            'sousRubrique' => $sousRubrique
        ]);
    }


    #[Route('/produit/{produit}', name: 'app_produit')]
    public function produit(Produit $produit): Response
    {

        return $this->render('accueil/produit.html.twig', [
            'controller_name' => 'AccueilController',
            'produit' => $produit
        ]);
    }




    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

}
