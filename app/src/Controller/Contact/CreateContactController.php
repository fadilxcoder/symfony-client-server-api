<?php

namespace App\Controller\Contact;

use App\Dto\CreateContact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CreateContactController extends AbstractController
{
    public function __construct(private ContactRepository $contactRepository)
    {
    }

    #[Route(
        path: "/api/contact-us",
        name: "api_contact_post_collection",
        methods: ["POST"]
    )]
    public function __invoke(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $createContactObject = $serializer->deserialize($request->getContent(), CreateContact::class, 'json');
        $persistedObj = $this->contactRepository->persist($createContactObject);

        if ((int) $persistedObj) {
            return $this->json([
                'message' => 'Thank you for contacting us !',
            ], Response::HTTP_CREATED);
        }

        throw new UnprocessableEntityHttpException('Nothing was persisted in DB !');
    }
}