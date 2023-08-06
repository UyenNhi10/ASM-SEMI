<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function productCategoryManagement(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $products = $productRepository->findAll();
        $categories = $categoryRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
