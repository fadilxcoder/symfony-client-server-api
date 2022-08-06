<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\Model;
use ApiPlatform\Core\OpenApi\Model\PathItem;
use ApiPlatform\Core\OpenApi\OpenApi;

class OpenApiFactory implements OpenApiFactoryInterface
{
    /**
     * @var OpenApiFactoryInterface
     */
    private $decorated;

    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);

        /** @var PathItem $path */
        foreach ($openApi->getPaths()->getPaths() as $key => $path) {
            // Hiding endpoint in Swagger UI
            if ($path->getGet() && 'hidden' === $path->getGet()->getSummary()) {
                $openApi->getPaths()->addPath($key, $path->withGet(null));
            }
        }

        // Added Client verifier and OAuth
        $schemas = $openApi->getComponents()->getSchemas();
        $schemas['Token'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'token' => [
                    'type' => 'string',
                    'readOnly' => true,
                ],
            ],
        ]);
        $schemas['Credentials'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'client_id' => [
                    'type' => 'string',
                    'example' => 'Atl45_cNn_007',
                ],
            ],
        ]);
        $schemas['FailedAuth'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'error' => [
                    'type' => 'string',
                    'readOnly' => true,
                    'example' => 'Invalid client-token !',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            'JWT Token',
            null,
            null,
            null,
            null,
            new Model\Operation(
                'postClientIdToken',
                ['Client Token'],
                [
                    '200' => [
                        'description' => 'Client OAuth token',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Token',
                                ],
                            ],
                        ],
                    ],
                    '401' => [
                        'description' => 'Unauthorized token',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/FailedAuth',
                                ],
                            ],
                        ],
                    ],
                ],
                'Get client authorization token.',
                'Verify client and get Open Authorization token.',
                null,
                [],
                new Model\RequestBody(
                    'Generate new OAuth Token',
                    new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/Credentials',
                            ],
                        ],
                    ])
                )
            )
        );
        $openApi->getPaths()->addPath('/oauth-client', $pathItem);

        return $openApi;
    }
}
