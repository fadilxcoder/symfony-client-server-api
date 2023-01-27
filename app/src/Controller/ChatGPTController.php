<?php

namespace App\Controller;

use App\Dto\Token;
use App\Services\GeneratorOpenAIService;
use App\Services\SecurityToken;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ChatGPTController extends AbstractController
{
    public function __construct(private GeneratorOpenAIService $openaiService)
    {
    }

    #[Route(
        path: "/chat-gpt",
        name: "api_chat_gpt",
        methods: ["GET"]
    )]
    public function __invoke(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $question = $request->get('question');
        $question = 'what is php ?';
        if ($question == null) {
            return $this->json(['http' => 'bad']);
        }

        $response= $this->openaiService->generateResponseOpenAi($question);

        return $this->json(['response' => $response]);
    }
}
