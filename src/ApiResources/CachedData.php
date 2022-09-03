<?php

namespace App\ApiResources;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     shortName="Redis User",
 *     collectionOperations={
 *          "get"={
 *              "path"="redis-user",
 *              "openapi_context"={
 *                  "summary"="Retrieves an Redis User resource.",
 *                  "description"="Retrieves an Redis User resource."
 *              }
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "path"="redis-user/{id}",
 *              "openapi_context"={
 *                  "summary"="hidden"
 *              }
 *          }
 *     }
 * )
 */
class CachedData
{
    /**
     * @var string
     * @ApiProperty(
     *     identifier=true,
     *     attributes={
     *         "openapi_context"={
     *             "type"="string",
     *             "example"="xxxxxxxxx_xxxxx"
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
     *             "example"="john Doe"
     *         }
     *     }
     * )
     */
    private $name;

    /**
     * @var string
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *             "type"="string",
     *             "example"="johndoe@example.com"
     *         }
     *     }
     * )
     */
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
