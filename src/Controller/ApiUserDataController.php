<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Admin;
use App\Repository\AdminRepository;
use App\Repository\LinksFolderRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ApiUserDataController extends AbstractController
{
    #[Route('/api/user/{user_id}', name: 'api_user_data')]
    public function index(
        int $user_id, 
        AdminRepository $adminRepository,
        LinksFolderRepository $linksFolderRepository
    ): JsonResponse
    {
        /** @var Admin $authUser */
        $authUser = $this->getUser();
        if(!$authUser){
            return $this->json(ApiOutputFormatter::message('unauthenticated'), 401);  
        }

        if($authUser->getId() !== $user_id &&  $this->isGranted('ROLE_ADMIN')){
            return $this->json(ApiOutputFormatter::message('unsufficient_rights'), 403);  
        }

        $user = $adminRepository->find($user_id);
        if(!$user){
            return $this->json(ApiOutputFormatter::message('user_not_found'), 404);
            $data['message'] = 'user_not_found';
        }

        $folders = $linksFolderRepository->findAll([
            'owners' => $user_id
        ]);

        $serializedFolders = [];
        foreach($folders as $folder){
            $serializedFolder = [
                'id' => $folder->getId(),
                'display_name' => $folder->getDisplayName(),
                'links' => [],
            ];
            foreach($folder->getLinks() as $link){
                $serializedFolder['links'][] = [
                    'id' => $link->getId(),
                    'url' => $link->getUrl(),
                ];
            }
            $serializedFolders[] = $serializedFolder;
        }

        /*
        die(`
            <h1>on aime la 8.6 !</h1>
            <img src="https://media.carrefour.fr/medias/9a0b53c14f5d3bb5a79939df4ba885d5/p_1500x1500/08714800038669-c1n1-s05.jpg" />
        `);
        */

        $data = [
            'authUser' => [
                'id' => $authUser->getId(),
                'roles' => $authUser->getRoles(),
                'identifier' => $authUser->getUserIdentifier(),
            ],
            'user' => [
                'id' => $user->getId(),
                'email' => $user->getEmail()
            ], 
            'folders' => $serializedFolders
        ];
        return $this->json($data);
    }
}

