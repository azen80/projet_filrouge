<?php

namespace App\Controller;

use App\Entity\Rubrique;
use App\Repository\RubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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




    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

}
