<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\DataProvider\RandomUserItemDataProvider;

#[ApiResource]
#[Get(
    uriTemplate: "/user/{id}",
    shortName: "Fake User",
    provider: RandomUserItemDataProvider::class
)]
class FakeUser
{
    /**
     * @var int
     */
    #[ApiProperty(
        identifier:true,
        openapiContext: [
            'type' => 'integer',
            'example' => 1
        ]
    )]
    private $id;

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
            'example' => 'John'
        ]
    )]
    private $firstName;

    /**
     * @var string
     */
    #[ApiProperty(
        openapiContext: [
            'type' => 'string',
            'example' => 'Doe'
        ]
    )]
    private $lastName;

    public function __construct(int $id, string $email, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
