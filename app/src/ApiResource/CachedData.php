<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\DataProvider\RedisUserCollectionDataProvider;

#[ApiResource]
#[Get(
    uriTemplate: 'redis-user/{id}',
    openapiContext: [
        "summary" => "hidden"
    ]
)]
#[GetCollection(
    uriTemplate: 'redis-user',
    openapiContext: [
        "summary" => "Retrieves a Redis User resource.",
        "description" => "Retrieves a Redis User resource."
    ],
    shortName: "Redis User",
    provider: RedisUserCollectionDataProvider::class
)]
class CachedData
{
    /**
     * @var string
     */
    #[ApiProperty(
        identifier:true,
        openapiContext: [
            'type' => 'string',
            'example' => 'xxxxxxxxx_xxxxx'
        ]
    )]
    private $id;

    /**
     * @var string
     */
    #[ApiProperty(
        openapiContext: [
            'type' => 'string',
            'example' => 'john Doe'
        ]
    )]
    private $name;

    /**
     * @var string
     */
    #[ApiProperty(
        openapiContext: [
            'type' => 'string',
            'example' => 'johndoe@example.com'
        ]
    )]
    private $email;

    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
