<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/burgers', name: 'burger_')]
class BurgerController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function liste(): Response
    {
        $burgers = [
            [
                'id' => 1,
                'name' => "cheeseburger"
            ],
            [
                'id' => 2,
                'name' => "smashburger"
            ],
            [
                'id' => 3,
                'name' => "CRUD burger"
            ]
        ];
 
        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/{id}', name: 'show')]
    public function show(int $id): Response
    {
        return $this->render('show.html.twig', [
            'id' => $id,
        ]);
    }
}