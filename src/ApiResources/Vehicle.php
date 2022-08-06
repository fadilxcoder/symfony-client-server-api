<?php

namespace App\ApiResources;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     shortName="Vehicles",
 *     collectionOperations={
 *          "get"={
 *              "path"="vehicles",
 *              "openapi_context"={
 *                  "summary"="Retrieves list of vehicles resource.",
 *                  "description"="Retrieves list of vehicles resource.",
 *                  "parameters"={
 *                      {
 *                          "name"="category",
 *                          "in"="query",
 *                          "description"="Vehicle category name",
 *                          "example"="small-cars",
 *                          "required"=true,
 *                          "schema"={
 *                              "type"="string",
 *                              "enum"={"small-cars", "family-cars", "suv-cars"}
 *                          }
 *                      }
 *                  }
 *              }
 *          },
 *          "post_rental_quote"={
 *              "path"="vehicle/rental-quote/{id}",
 *              "method"="POST",
 *              "status"=200,
 *              "openapi_context"={
 *                  "summary"="Creates a contact us resource.",
 *                  "description"="It creates a contact us resource.",
 *                  "requestBody": {
 *                      "content": {
 *                          "application/json": {
 *                              "schema": {
 *                                  "type": "object",
 *                                  "properties": {
 *                                      "a": {"type": "string", "example": "John Doe"}
 *                                  },
 *                              },
 *                          },
 *                      },
 *                  },
 *                  "responses": {
 *                      "200": {
 *                          "description": "Description",
 *                          "content": {
 *                              "application/json": {
 *                                  "schema": {
 *                                      "type": "object",
 *                                      "properties": {
 *                                          "b": {"type": "string", "example": "John Doe"}
 *                                      },
 *                                  },
 *                              },
 *                          },
 *                      },
 *                  },
 *              }
 *          },
 *          "post_book_now"={
 *              "path"="vehicle/book-now/{id}",
 *              "method"="POST"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "path"="vehicle/{id}",
 *              "openapi_context"={
 *                  "summary"="Retrieves vehicle details resource.",
 *                  "description"="Retrieves vehicle details resource."
 *              }
 *          }
 *     }
 * )
 */
class Vehicle
{
    /**
     * @var int
     * @ApiProperty(
     *     identifier=true,
     *     attributes={
     *         "openapi_context"={
     *             "type"="integer",
     *             "example"="1"
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
     *             "example"="Toyota Hilux"
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
     *             "example"="http://www.domain.com/image/path/my-image.jpg"
     *         }
     *     }
     * )
     */
    private $imageFullPath;

    /**
     * @var int
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *              "type"="integer",
     *              "example"="28"
     *         }
     *     }
     * )
     */
    private $price;

    /**
     * @var string
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *              "type"="integer",
     *              "example"="Automatic",
     *              "enum"={"Automatic", "Manual", "Automated Manual", "Continuously Variable"}
     *         }
     *     }
     * )
     */
    private $transmission;

    public function __construct(int $id, string $name, string $imageFullPath, int $price, string $transmission)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageFullPath = $imageFullPath;
        $this->price = $price;
        $this->transmission = $transmission;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImageFullPath(): string
    {
        return $this->imageFullPath;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTransmission(): string
    {
        return $this->transmission;
    }
}
