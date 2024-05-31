<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Utils\Formatters;
use Symfony\Component\Security\Core\User\UserInterface;

class IndexController extends AbstractController {
    #[ Route( '/', name: 'app_index' ) ]

    public function index( UserInterface $user ): Response {
        return $this->render( 'index/index.html.twig', [
            'title' => Formatters::format_title( 'home' ),
            'user' => $user,
        ] );
    }
}
