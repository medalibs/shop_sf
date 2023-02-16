<?php

namespace App\UI\Rest\Controller\StoreManager;

use App\Application\Command\StoreManager\Request\CreateStoreManager AS RequestCreateStoreManager;
use App\Application\Command\StoreManager\CreateStoreManagerCommandHandler;
use App\Infrastructure\ParamConverter\CreateProductConverter;
use App\UI\Rest\DTO\CreateStoreManagerDTO;
use Nelmio\ApiDocBundle\Model\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class CreateStoreManagerAction extends AbstractController
{

    public function __construct(private readonly CreateStoreManagerCommandHandler $handler)
    {
    }
    #[Route('/api/store/managers', name: 'app_store_manager_post', methods:['POST'])]
    #[OA\Response(
        response: 201,
        description: 'Successful response'
    )]
    #[OA\RequestBody(content: new OA\JsonContent(ref:"#/components/schemas/StoreManager"))]
    #[OA\Tag(name: 'StoreManager')]
    #[CreateStoreManagerConverter('requestCreateStoreManager')]
    public function __invoke(RequestCreateStoreManager $requestCreateStoreManager): JsonResponse
    {
        $storeManager = $this->handler->handle($requestCreateStoreManager);

        return new JsonResponse(CreateStoreManagerDTO::fromStoreManager($storeManager),Response::HTTP_CREATED);
    }
}
