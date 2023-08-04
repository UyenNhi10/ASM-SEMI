<?php

// src/Controller/UserController.php

namespace App\Controller;

// src/Controller/UserController.php

namespace App\Controller;

// src/Controller/UserController.php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/users', name: 'user_list')]
    public function userList(): Response
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        $users = $userRepository->findAll();

        return $this->render('user/list.html.twig', ['users' => $users]);
    }
}
