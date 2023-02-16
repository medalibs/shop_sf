<?php

namespace App\UI\Rest\Controller\StoreProductStock;

use App\Application\Command\Stock\CreateStockCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Application\Command\Stock\Request\CreateStock as RequestCreateStock;
use OpenApi\Attributes as OA;
class SetStoreProductStock extends AbstractController
{
    public function __construct(private readonly CreateStockCommandHandler $handler)
    {
    }
    #[Route('/api/store/{storeId}/product/{productId}/stock', name: 'app_store_product_stock_patch', methods: ['PATCH'])]
    #[OA\Response(
        response: 200,
        description: 'Successful response'
    )]
    #[OA\RequestBody(content: new OA\JsonContent(ref: "#/components/schemas/Stock"))]
    #[SetStockConverter('requestCreateStock')]
    public function __invoke(RequestCreateStock $requestCreateStock):JsonResponse
    {
        $this->handler->handle($requestCreateStock);
        return new JsonResponse([], Response::HTTP_OK);

    }
}