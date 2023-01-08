<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\EsxUser;
use App\Exceptions\EmailFilterException;
use App\Services\ElasticSearch;

class EsxUserCollectionDataProvider implements ProviderInterface
{
    private $esx;

    public function __construct(ElasticSearch $esx)
    {
        $this->esx = $esx;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if (empty($context['filters']) && empty($context['filters']['email'])) {
            throw new EmailFilterException('Email filter is not provided !');
        }

        $esxUser = $this->esx->search($context['filters']['email']);

        if ($operation instanceof CollectionOperationInterface) {
            return [
                new EsxUser(
                    $esxUser['id'],
                    $esxUser['name'],
                    $esxUser['email'],
                    $esxUser['address'],
                    $esxUser['description']
                ),
            ];
        }

        return null;
    }
}
