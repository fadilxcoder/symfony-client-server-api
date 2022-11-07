<?php

namespace App\ApiResources;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     shortName="PostgreSQL Actors",
 *      collectionOperations={
 *          "get"={
 *              "path"="pg-actors",
 *              "openapi_context"={
 *                  "summary"="Retrieves actors list from PgSQL.",
 *                  "description"="Retrieves actors list from PgSQL."
 *              }
 *          }
 *     },
 *      itemOperations={
 *          "get"={
 *              "path"="pg-actors/{id}",
 *              "openapi_context"={
 *                  "summary"="hidden"
 *              }
 *          }
 *      }
 * )
 */
class Actor
{
    /**
     * @var int
     * @ApiProperty(
     *     identifier=true,
     *     attributes={
     *         "openapi_context"={
     *             "type"="integer",
     *             "example"=1
     *         }
     *     }
     * )
     */
    private $id;

    /**
     * @var string
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *             "type"="string",
     *             "example"="John"
     *         }
     *     }
     * )
     */
    private $firstName;

    /**
     * @var string
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *             "type"="string",
     *             "example"="Doe"
     *         }
     *     }
     * )
     */
    private $lastName;

    /**
     * @var string
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *             "type"="string",
     *             "example"="2021-05-24",
     *             "format"="date"
     *         }
     *     }
     * )
     */
    private $lastUpdated;

    public function __construct(int $id, string $firstName, string $lastName, \DateTime $lastUpdated)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->lastUpdated = $lastUpdated;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }
}
