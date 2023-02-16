<?php

namespace App\Infrastructure\ParamConverter;

use App\Application\Command\Stock\Request\CreateStock;
use App\Domain\Entity\Store;
use App\Domain\Repository\StoreRepositoryInterface;
use Attribute;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

#[Attribute] class StoreConverter implements ParamConverterInterface
{
    public function __construct(private readonly StoreRepositoryInterface $storeRepository)
    {
    }

    public function apply(Request $request, ParamConverter $configuration): void
    {
        dd($request->get('productId'),$request->get('storeId'),$request->getContent());
        $store = $this->storeRepository->find(2);
        if($store){
            $request->attributes->set($configuration->getName(), $store);
        }
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === CreateStock::class;
    }
}
