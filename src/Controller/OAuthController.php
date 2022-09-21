<?php

namespace App\Controller;

use App\Dto\Token;
use App\Services\SecurityToken;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class OAuthController extends AbstractController
{
    private $securityToken;

    public function __construct(SecurityToken $securityToken)
    {
        $this->securityToken = $securityToken;
    }

    /**
     * @Route(
     *      name="api_oauth_token",
     *      path="/%api_major_version%/oauth-client",
     *      methods={"POST"},
     * )
     */
    public function __invoke(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $client = $serializer->deserialize($request->getContent(), Token::class, 'json');
        $token = $this->securityToken->verifyClient($client);

        if ($token) {
            return $this->json([
                'token' => $this->securityToken->getToken(),
            ]);
        }

        throw new UnauthorizedHttpException('', 'Invalid client-token !', null, Response::HTTP_UNAUTHORIZED);
    }
}
