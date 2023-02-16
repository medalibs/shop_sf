<?php

namespace App\Infrastructure\ParamConverter;

use App\Application\Command\StoreManager\Request\CreateStoreManager;
use Attribute;
use JsonException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

#[Attribute] class CreateStoreManagerConverter implements ParamConverterInterface
{
    public function __construct()
    {
    }

    /**
     * @throws JsonException
     */
    public function apply(Request $request, ParamConverter $configuration): void
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $createStoreManager = new CreateStoreManager($data['name']);
        $request->attributes->set($configuration->getName(), $createStoreManager);
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === CreateStoreManager::class;
    }
}
