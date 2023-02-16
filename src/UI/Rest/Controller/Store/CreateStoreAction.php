<?php

namespace App\UI\Rest\Controller\Store;

use App\Application\Command\Store\CreateStoreCommandHandler;
use App\Application\Command\Store\Request\CreateStore as RequestCreateStore;
use App\Domain\Repository\StoreRepositoryInterface;
use App\UI\Rest\DTO\CreateStoreDTO;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateStoreAction extends AbstractController
{

    public function __construct(private CreateStoreCommandHandler $handler,private StoreRepositoryInterface $storeRepository)
    {
    }

    #[Route('/api/stores', name: 'app_store_post', methods: ['POST'])]
    #[OA\Response(
        response: 201,
        description: 'Created'
    )]
    #[OA\RequestBody(content: new OA\JsonContent(ref: "#/components/schemas/Store"))]
    #[OA\Tag(name: 'Store')]
    #[CreateStoreConverter('requestCreateStore')]
    public function __invoke(RequestCreateStore $requestCreateStore): JsonResponse
    {
        $store = $this->handler->handle($requestCreateStore);

        return new JsonResponse(CreateStoreDTO::fromStore($store), Response::HTTP_CREATED);
    }
}
