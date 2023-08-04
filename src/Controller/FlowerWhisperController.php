<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class FlowerWhisperController extends AbstractController
{
    #[Route('/flowerwhisper', name: 'app_flower_whisper')]
    public function index(): Response
    {
        return $this->render('flower_whisper/index.html.twig', [
            'controller_name' => 'FlowerWhisperController',
        ]);
    }
}
