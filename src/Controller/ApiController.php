<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController {
    #[ Route( '/api', name: 'api_index' ) ]

    public function index(): JsonResponse {
        return $this->json( [
            'name' => 'ultradashboard',
            'version' => '1.0.0',
        ] );
    }
}

