<?php
namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */
    public function index(PropertyRepository $repository): Response
    {
        // Securité
        // Recuperation de données

        $properties = $repository->findLatest();
        dump($properties);

        return $this->render('pages/home.html.twig', [
            'properties' => $properties
        ]);
    }
}