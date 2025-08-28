<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use App\Form\ContactFormType;
use Symfony\Component\Mime\Email;
use App\Repository\RubriqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\mailer;


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


     #[Route('/sousrubrique/{sousRubrique}', name: 'app_sousrbrique')]
    public function sousRubrique(SousRubrique $sousRubrique): Response
    {

        return $this->render('accueil/sousrubrique.html.twig', [
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






    #[Route('/produit/{id}/delete', name: 'app_produit_delete', methods: ['POST'])]
    public function delete(Request $request, Produit $produit, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_produit_'.$produit->getId(), $request->request->get('_token'))) {
            $em->remove($produit);
            $em->flush();
            $this->addFlash('success', 'Produit supprimé.');
        }
        return $this->redirectToRoute('app_sousrubrique', [
            'sousRubrique' => $produit->getSousRubrique()->getId()
        ]);
    }



    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $email = (new Email())
                ->from('hello@example.com')
                ->to('you@example.com')
                ->subject($data['sujet'])
                ->html($data['message']);

            $mailer->send($email);


            return $this->redirectToRoute('app_accueil');
        }





        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form
        ]);
    }



    #[Route('/search', name: 'app_search')]
    public function search(Request $request): Response
    {
        $query = $request->query->get('search'); 

        dd($query);
    }
}




