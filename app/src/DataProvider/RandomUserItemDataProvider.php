<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\FakeUser;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RandomUserItemDataProvider implements ProviderInterface
{
    private $url;

    public function __construct(private HttpClientInterface $client)
    {
        $this->url = 'https://reqres.in/api/users/';
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $id = $uriVariables['id'];
        $response = $this->client->request('GET', $this->url.$id);
        // $content = $response->getContent();
        $content = $response->toArray();
        $content = $content['data'];

        return new FakeUser($id, $content['email'], $content['first_name'], $content['last_name']);
    }
}
