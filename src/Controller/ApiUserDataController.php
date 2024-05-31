<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Admin;
use App\Repository\AdminRepository;
use App\Repository\LinksFolderRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ApiUserDataController extends AbstractController {
    #[ Route( '/api/user/{user_id}', name: 'api_user_data' ) ]

    public function index(
        int $user_id,
        AdminRepository $adminRepository,
        LinksFolderRepository $linksFolderRepository
    ): JsonResponse {
        /** @var Admin $authUser */
        $authUser = $this->getUser();
        if ( !$authUser ) {
            return $this->json( ApiOutputFormatter::message( 'unauthenticated' ), 401 );

        }

        if ( $authUser->getId() !== $user_id &&  $this->isGranted( 'ROLE_ADMIN' ) ) {
            return $this->json( ApiOutputFormatter::message( 'unsufficient_rights' ), 403 );

        }

        $user = $adminRepository->find( $user_id );
        if ( !$user ) {
            return $this->json( ApiOutputFormatter::message( 'user_not_found' ), 404 );
            $data[ 'message' ] = 'user_not_found';
        }

        $folders = $linksFolderRepository->findAll( [
            'owners' => $user_id
        ] );

        $serializedFolders = [];
        foreach ( $folders as $folder ) {
            $serializedFolder = [
                'id' => $folder->getId(),
                'display_name' => $folder->getDisplayName(),
                'color' => $folder->getColor(),
                'icon' => $folder->getIcon(),
                'links' => [],
            ];
            foreach ( $folder->getLinks() as $link ) {
                $serializedFolder[ 'links' ][] = [
                    'id' => $link->getId(),
                    'display_name' => $link->getDisplayName(),
                    'trigger' => $link->getSearchUrl(),
                    'url' => $link->getUrl(),
                    'searchUrl' => $link->getSearchUrl(),
                ];
            }
            $serializedFolders[] = $serializedFolder;
        }

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
        return $this->json( ApiOutputFormatter::message( 'user_not_found', $data ) );
    }
}

