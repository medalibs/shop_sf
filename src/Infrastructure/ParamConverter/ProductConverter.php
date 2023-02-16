<?php

namespace App\Infrastructure\ParamConverter;

use App\Domain\Entity\Product;
use App\Domain\Repository\ProductRepositoryInterface;
use Attribute;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

#[Attribute] class ProductConverter implements ParamConverterInterface
{
    public function __construct(private readonly ProductRepositoryInterface $productRepository)
    {
    }

    public function apply(Request $request, ParamConverter $configuration): void
    {

        $product = $this->productRepository->find(1);
        if($product){
            $request->attributes->set($configuration->getName(), $product);
        }
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === Product::class;
    }
}
