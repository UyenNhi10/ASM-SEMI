<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/search', name: 'app_search')]
    public function index(Request $request): Response
    {
        $keyword = $request->query->get('keyword', '');

        $products = $this->productRepository->findByKeyword($keyword);

        return $this->render('search/index.html.twig', [
            'products' => $products,
        ]);
    }
}
