<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProductRepository;
use App\Entity\Category;


class FlowerBasketController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }

    #[Route('/basket', name: 'app_flower_basket')]

    public function index(ProductRepository $productRepository): Response
    {

        $NameCategory = $this->entityManager->getRepository(Category::class)->findOneBy(['Name_Category' => 'Flower Basket']);
        $products = $productRepository->findBy(['category' => $NameCategory]);

        return $this->render('flower_basket/index.html.twig', [
            'products' => $products,
        ]);
    }
}
