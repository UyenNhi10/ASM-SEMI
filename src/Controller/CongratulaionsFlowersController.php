<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProductRepository;
use App\Entity\Category;


class CongratulaionsFlowersController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }

    #[Route('/congratulations', name: 'app_flower_congratulaions')]

    public function index(ProductRepository $productRepository): Response
    {

        $NameCategory = $this->entityManager->getRepository(Category::class)->findOneBy(['Name_Category' => 'Congratulations Flowers']);
        $products = $productRepository->findBy(['category' => $NameCategory]);

        return $this->render('congratulaions_flowers/index.html.twig', [
            'products' => $products,
        ]);
    }
}
