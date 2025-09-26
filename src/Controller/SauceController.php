<?php

namespace App\Controller;

use App\Repository\SauceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SauceController extends AbstractController
{
    #[Route('/sauces', name: 'app_sauce')]
    public function index(SauceRepository $SauceRepository): Response
    {
        $sauce = $SauceRepository->findAll();
        return $this->render('index.html.twig', [
            'entity' => $sauce, 'title' => 'Sauce'
        ]);
    }  
}
