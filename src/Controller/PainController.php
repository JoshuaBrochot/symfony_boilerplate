<?php

namespace App\Controller;

use App\Repository\PainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PainController extends AbstractController
{
    #[Route('/pains', name: 'app_pain')]
    public function index(PainRepository $PainRepository): Response
    {
        $pain = $PainRepository->findAll();
        return $this->render('index.html.twig', [
            'entity' => $pain, 'title' => 'Pain'
        ]);
    }  
}
