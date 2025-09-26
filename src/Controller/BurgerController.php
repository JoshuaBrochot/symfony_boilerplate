<?php

namespace App\Controller;

use App\Repository\BurgerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/burgers', name: 'burger_')]
class BurgerController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function liste(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();
        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/show/{id}', name: 'show')]
    public function show(int $id): Response
    {
        return $this->render('show.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route('/index', name: 'index')]
    public function index(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();
        return $this->render('index.html.twig', [
            'entity' => $burgers, 'title' => 'Burger'
        ]);
    }
}