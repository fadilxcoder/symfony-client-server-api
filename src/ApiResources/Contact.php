<?php

namespace App\ApiResources;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     shortName="Contact Us",
 *     collectionOperations={
 *          "post_contact": {
 *              "route_name"="api_contact_post_collection",
 *              "path"="contact-us",
 *              "method"="POST",
 *              "openapi_context"={
 *                  "summary"="Creates a contact us resource.",
 *                  "description"="It creates a contact us resource.",
 *                  "requestBody": {
 *                      "content": {
 *                          "application/json": {
 *                              "schema": {
 *                                  "type": "object",
 *                                  "properties": {
 *                                      "full_name": {"type": "string", "example": "John Doe"},
 *                                      "phone ": {"type": "string", "example": "+230 5555 5555"},
 *                                      "email": {"type": "string", "example": "johndoe@gmail.com"},
 *                                      "message": {"type": "string", "example": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo lectus risus. Vestibulum cursus arcu vel condimentum euismod. Sed nec erat eu sem mattis porta."}
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
class Contact
{
    /**
     * @var string
     * @ApiProperty(
     *     attributes={
     *         "openapi_context"={
     *             "type"="string",
     *             "example"="Thank you for contacting us !"
     *         }
     *     }
     * )
     */
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
