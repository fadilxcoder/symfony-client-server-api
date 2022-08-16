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
 *              "route_name"="api_free_quote_post",
 *              "method"="POST",
 *              "status"=200,
 *              "openapi_context"={
 *                  "summary"="Free quote for renting a vehicle.",
 *                  "description"="Free quote for renting a vehicle for a period of time.",
 *                  "parameters"={
 *                      {
 *                          "name"="id",
 *                          "in"="path",
 *                          "description"="Vehicle identifier",
 *                          "example"="1",
 *                          "required"=true,
 *                          "schema"={
 *                              "type"="integer"
 *                          }
 *                      }
 *                  },
 *                  "requestBody": {
 *                      "content": {
 *                          "application/json": {
 *                              "schema": {
 *                                  "type": "object",
 *                                  "properties": {
 *                                      "pick_up_date": {"type": "string", "example": "2021-05-24", "format": "date"},
 *                                      "pick_up_time": {"type": "string", "example": "05:00", "enum": {
 *                                              "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00",  "20:00", "21:00"
 *                                          }
 *                                      },
 *                                      "pick_up_location": {"type": "string", "example": "Airport of mauritius"},
 *                                      "drop_off_date": {"type": "string", "example": "2021-11-27", "format": "date"},
 *                                      "drop_off_time": {"type": "string", "example": "14:00", "enum": {
 *                                              "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00",  "20:00", "21:00"
 *                                          }
 *                                      },
 *                                      "drop_off_location": {"type": "string", "example": "Hotels, AirBnB, ..."}
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
 *                                          "days": {"type": "integer", "example": 10},
 *                                          "condition": {"type": "string", "example": "Pay 25% of total upon booking"},
 *                                          "price_per_day": {"type": "integer", "example": 28},
 *                                          "total": {"type": "integer", "example": 280},
 *                                          "pay": {"type": "integer", "example": 70},
 *                                          "remaining": {"type": "integer", "example": 210}
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
