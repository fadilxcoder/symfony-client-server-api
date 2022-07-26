<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\ApiResources\EsxUser;
use App\Exceptions\EmailFilterException;
use App\Services\ElasticSearch;

class EsxUserCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $esx;

    public function __construct(ElasticSearch $esx)
    {
        $this->esx = $esx;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        if (empty($context['filters']) && empty($context['filters']['email'])) {
            throw new EmailFilterException('Email filter is not provided !');
        }

        $esxUser = $this->esx->search($context['filters']['email']);

        return [
            new EsxUser(
                $esxUser['id'],
                $esxUser['name'],
                $esxUser['email'],
                $esxUser['address'],
                $esxUser['description']
            )
        ];
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return EsxUser::class === $resourceClass;
    }
}
