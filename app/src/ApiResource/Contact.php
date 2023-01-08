<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\Controller\Contact\CreateContactController;

#[ApiResource]
#[Post(
    uriTemplate: '/contact-us',
    controller: CreateContactController::class,
    openapiContext: [
        'summary' => 'Creates a contact us resource.',
        'description' => 'It creates a contact us resource.',
        'requestBody' => [
            'content' => [
                'application/json' => [
                    'schema' => [
                        'type' => 'object',
                        'properties' => [
                            'full_name' => ['type' => 'string'],
                            'phone' => ['type' => 'string'],
                            'email' => ['type' => 'string'],
                            'message' => ['type' => 'string'],
                        ]
                    ],
                    'example' => [
                        'full_name' => 'John Doe',
                        'phone' => '+230 5555 5555',
                        'email' => 'johndoe@gmail.com',
                        'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo lectus risus. Vestibulum cursus arcu vel condimentum euismod. Sed nec erat eu sem mattis porta.'
                    ]
                ]
            ]
        ]
    ],
    shortName: "Contact Us",
    name: 'api_contact_post_collection'
)]
class Contact
{
    #[ApiProperty(
        openapiContext: [
            'type' => 'string',
            'example' => 'Thank you for contacting us !'
        ]
    )]
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