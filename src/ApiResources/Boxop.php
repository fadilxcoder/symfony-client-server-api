<?php

namespace App\ApiResources;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     shortName="PoC BOXOP",
 *     collectionOperations={
 *          "post_b2b_product": {
 *              "route_name"="api_b2b_post",
 *              "path"="b2b-product/{manufacturer-id}/{product-id}",
 *              "method"="POST",
 *              "openapi_context"={
 *                  "summary"="Fetch product info & order now",
 *                  "description"="Fetches product information & order product directly on B2B Client.",
 *                  "requestBody": {
 *                      "content": {
 *                          "application/json": {
 *                              "schema": {
 *                                  "type": "object",
 *                                  "properties": {},
 *                              },
 *                          },
 *                      },
 *                  },
 *                  "responses": {
 *                      "201": {
 *                          "description": "Order from B2B Client",
 *                          "content": {
 *                              "application/json": {
 *                                  "schema": {
 *                                      "type": "object",
 *                                      "properties": {
 *                                          "order_id": {"type": "string", "example": "46546fcsd4c-sfd65sd4f6s5f4sd6-5fsd46fs4d6f4"}
 *                                      }
 *                                  },
 *                              },
 *                          },
 *                      },
 *                  },
 *              }
 *          }
 *     },
 *     itemOperations={}
 * )
 */
class Boxop
{
    /**
     * @var int
     * @ApiProperty(
     *     identifier=true
     * )
     */
    private $id;
}
