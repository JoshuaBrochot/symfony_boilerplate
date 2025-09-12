<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/burgers', name: 'burgers_')]
class BurgerController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function liste(): Response
    {
        $burgers = ["Burger 1", "Burger 2", "Burger 3"];
 
        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }
}