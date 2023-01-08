<?php

namespace App\Services;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ElasticSearch
{
    private $connection;

    public function __construct(string $connection)
    {
        $this->connection = $connection;
    }

    private function init(): Client
    {
        return ClientBuilder::create()
            ->setHosts([$this->connection])
            ->build();
    }

    public function search(string $email)
    {
        $params = [
            'size' => 100,
            'index' => 'faker',
            'body' => [
                'query' => [
                    'match' => [
                        'email' => $email,
                    ],
                ],
            ],
        ];

        $response = $this->init()->search($params);
        $result = $response['hits']['hits'];

        if (0 === count($result)) {
            throw new NotFoundHttpException('No result found !');
        }

        $firstElem = $result[0];

        return [
            'id' => $firstElem['_id'],
            'name' => $firstElem['_source']['name'],
            'address' => $firstElem['_source']['address'],
            'email' => $firstElem['_source']['email'],
            'description' => $firstElem['_source']['description'],
        ];
    }
}
