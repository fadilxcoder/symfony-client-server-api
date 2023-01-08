<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\DataProvider\EsxUserCollectionDataProvider;

#[ApiResource]
#[Get(
    uriTemplate: "/esx-user/{id}",
    openapiContext: [
        "summary" => "hidden"
    ],
)]
#[GetCollection(
    uriTemplate: "/esx-user",
    openapiContext: [
        "summary" => "Retrieves an ESX User resource.",
        "description" => "Retrieves an ESX User resource.",
        "parameters" => [
            [
                "name" => "email",
                "in" => "query",
                "description" => "ESX user email",
                "example" => "pwaters@auer.com",
                "required" => true,
                "schema" => [
                    "type" => "string"
                ],
            ]
        ]
    ],
    shortName: "ESX User",
    provider: EsxUserCollectionDataProvider::class
)]
class EsxUser
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

    /**
     * @var string
     */
    #[ApiProperty(
        openapiContext: [
            'type' => 'string',
            'example' => '426 Murray Courts...'
        ]
    )]
    private $address;

    /**
     * @var string
     */
    #[ApiProperty(
        openapiContext: [
            'type' => 'string',
            'example' => 'Reiciendis nesciunt est et alias repellendus.....'
        ]
    )]
    private $description;

    public function __construct(string $id, string $name, string $email, string $address, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->description = $description;
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

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
