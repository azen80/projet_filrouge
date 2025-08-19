<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();

        $panier = $session->get('panier', []);
        

        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }


    #[Route('/panier/add/{produit}', name: 'app_panier_add')]
    public function add(Produit $produit, Request $request): Response
    {
        $session = $request->getSession();

        $panier = $session->get('panier', []);

        if (isset($panier[$produit->getId()]))
            $panier[$produit->getId()]++;
        else
            $panier[$produit->getId()] = 1;


        $session->set('panier', $panier);

        return $this->redirectToRoute('app_panier');
    }




    #[Route('/panier/del/{produit}', name: 'app_panier_del')]
    public function del(Produit $produit, Request $request): Response
    {
        $session = $request->getSession();

        $panier = $session->get('panier', []);

        if (isset($panier[$produit->getId()])) {

        
            $panier[$produit->getId()]--;

            if ($panier[$produit->getId()] == 0) {
                unset($panier[$produit->getId()]);
            }

        }


        $session->set('panier', $panier);

        return $this->redirectToRoute('app_panier');
    }
}
