<?php

namespace App\Controller;

use App\Entity\Oignon;
use App\Repository\OignonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OignonController extends AbstractController
{
    public function create(OignonRepository $entityManager): Response
    {
        $oignon = new Oignon();
        $oignon->setName('Oignon rouge');
    
        // Persister et sauvegarder l'oignon
        $entityManager->persist($oignon);
        $entityManager->flush();
    
        return new Response('Oignon créé avec succès !');
    }

    #[Route('/oignons', name: 'app_oignon')]
    public function index(OignonRepository $OignonRepository): Response
    {
        $oignon = $OignonRepository->findAll();
        return $this->render('index.html.twig', [
            'entity' => $oignon, 'title' => 'Oignon'
        ]);
    }  
}
