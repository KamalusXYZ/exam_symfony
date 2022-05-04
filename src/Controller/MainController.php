<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(PublicationRepository $publicationRepository): Response
    {

        return $this->render('main/index.html.twig', [
            'publications' => $publicationRepository->findAll()


        ]);
    }

    #[Route('/brand/{id}', name: 'brand', methods: ['GET'])]
    public function displayBrand(Publication $brand, PublicationRepository $publications): Response
    {

        return $this->render('main/brand.html.twig',
            [
                'publications' => $publications->findAll(),
                'brand' => $brand

            ]);
    }
}
