<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\ApiResources\FakeUser;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RandomUserItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    private $url;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->url = 'https://reqres.in/api/users/';
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        $response = $this->client->request('GET', $this->url . $id);
        # $content = $response->getContent();
        $content = $response->toArray();
        $content = $content['data'];

        return new FakeUser($id, $content['email'], $content['first_name'], $content['last_name']);
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return FakeUser::class === $resourceClass;
    }
}
