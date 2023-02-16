<?php

namespace App\UI\Rest\Controller\Store;

use App\Application\Command\Store\FindStoreCommandHandler;
use App\Application\Command\Store\Request\FindStore;
use App\Domain\Repository\StoreRepositoryInterface;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchStoreAction extends AbstractController
{

    public function __construct(
        private FindStoreCommandHandler $handler,
        private StoreRepositoryInterface $storeRepository
    ) {
    }

    #[Route('/api/stores', name: 'app_store_search', methods: ['Get'])]
    #[OA\Response(
        response: 200,
        description: 'Successful response'
    )]
    #[OA\Parameter(
        name: 'name',
        description: 'Store name to find',
        in: 'query',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\Parameter(
        name: 'distance',
        description: 'Store distance in meters',
        in: 'query',
        schema: new OA\Schema(type: 'int')
    )]
    #[OA\Parameter(
        name: 'latitude',
        description: 'Search from this latitude',
        in: 'query',
        schema: new OA\Schema(type: 'float')
    )]
    #[OA\Parameter(
        name: 'longitude',
        description: 'Search from this longitude',
        in: 'query',
        schema: new OA\Schema(type: 'float')
    )]
    #[OA\Parameter(
        name: 'page',
        description: 'Page number',
        in: 'query',
        schema: new OA\Schema(type: 'int')
    )]
    #[OA\Parameter(
        name: 'limit',
        description: 'Number of rows per page',
        in: 'query',
        schema: new OA\Schema(type: 'int')
    )]
    #[OA\Tag(name: 'Store')]
    public function __invoke(Request $request): JsonResponse
    {
        $findStore = new FindStore($request->query->all());
        $stores = $this->handler->handle($findStore);

        return new JsonResponse($stores, Response::HTTP_OK);
    }
}
