<?php

namespace App\UI\Rest\Controller\Product;

use App\Application\Command\Product\ListProductCommandHandler;
use App\Application\Command\Product\Request\FindProduct;
use App\UI\Rest\DTO\CreateProductDTO;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListProductAction extends AbstractController
{

    public function __construct(private ListProductCommandHandler $handler)
    {
    }

    #[Route('/api/products', name: 'app_product_get', methods: ['Get'])]
    #[OA\Response(
        response: 200,
        description: 'Successful response'
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
    #[OA\Tag(name: 'Product')]
    public function __invoke(Request $request): JsonResponse
    {

        $findProduct = new FindProduct($request->query->all());
        $products = $this->handler->handle($findProduct);

        return new JsonResponse($products, Response::HTTP_OK);
    }
}
