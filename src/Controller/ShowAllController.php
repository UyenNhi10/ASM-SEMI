<?php

namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category; // Import Category entity
use Doctrine\Persistence\ManagerRegistry;
class ShowAllController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }
    #[Route('/show_all', name: 'show_all')]
    public function index(ProductRepository $productRepository): Response
    {

        $products = $productRepository->findAll(); // Retrieve the products
        return $this->render('show_all/index.html.twig', [
            'products' => $products, // Pass the products variable to the template
        ]);
    }
}

