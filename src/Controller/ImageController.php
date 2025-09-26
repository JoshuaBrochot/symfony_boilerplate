<?php

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ImageController extends AbstractController
{
    #[Route('/imgs', name: 'app_image')]
    public function index(ImageRepository $ImageRepository): Response
    {
        $image = $ImageRepository->findAll();
        return $this->render('index.html.twig', [
            'entity' => $image, 'title' => 'Image'
        ]);
    }  
}
