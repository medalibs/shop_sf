<?php

namespace App\Infrastructure\ParamConverter;

use App\Application\Command\Store\Request\CreateStore;
use App\Domain\Repository\StoreManagerRepositoryInterface;
use Attribute;
use JsonException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

#[Attribute] class CreateStoreConverter implements ParamConverterInterface
{
    public function __construct(private StoreManagerRepositoryInterface $storeManagerRepository)
    {
    }

    /**
     * @throws JsonException
     */
    public function apply(Request $request, ParamConverter $configuration): void
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $storeManager = $this->storeManagerRepository->findStoreManagerById($data['storeManager']['id']);
        if($storeManager){
            $createStore = new CreateStore($data['name'], $data['address'], $data['latitude'], $data['longitude'], $storeManager);
            $request->attributes->set($configuration->getName(), $createStore);
        }
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === CreateStore::class;
    }
}
