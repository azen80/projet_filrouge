<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Service\Panier;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(Panier $panier, ProduitRepository $repo): Response
    {
        $panier_complet = [];
        
        
        
        foreach ($panier->liste() as $id => $quantite) {

            $produit = $repo->find($id);
            $panier_complet[] = [
                'produit' => $produit,
                'quantite' => $quantite
            ];
        }

        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'panier' => $panier_complet
        ]);
    }



    

    #[Route('/panier/add/{produit}', name: 'app_panier_add')]
    public function add(Produit $produit, Panier $panier): Response
    {
        
        $panier->add($produit->getId());

        return $this->redirectToRoute('app_panier');
    }




    #[Route('/panier/del/{produit}', name: 'app_panier_del')]
    public function del(Produit $produit, Panier $panier): Response
    {
       
        $panier->del($produit->getId());

        return $this->redirectToRoute('app_panier');
    }




    #[Route('/panier/clear', name: 'app_panier_clear')]
    public function clear(Request $request): Response
    {
        $session = $request->getSession();
        $session->remove('panier');

        return $this->redirectToRoute('app_panier');
    }
}



