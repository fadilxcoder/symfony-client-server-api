<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\ApiResources\Actor;
use App\Repository\ActorsRepository;

class ActorsCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $actorsRepository;

    public function __construct(ActorsRepository $actorsRepository)
    {
        $this->actorsRepository = $actorsRepository;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $response = [];
        foreach ($this->actorsRepository->findAll() as $item) {
            $response[] = new Actor(
                $item['actor_id'],
                $item['first_name'],
                $item['last_name'],
                new \DateTime($item['last_update'])
            );
        }

        return $response;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Actor::class === $resourceClass;
    }
}
