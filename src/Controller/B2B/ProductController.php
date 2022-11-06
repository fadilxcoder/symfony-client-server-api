<?php

namespace App\Controller\B2B;

use App\Repository\B2B\ManufacturerRespositoryInterface;
use App\Util\OAuthRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductController extends AbstractController
{
    private $productRespository;

    private $client;

    public function __construct(
        ManufacturerRespositoryInterface $productRespository,
        HttpClientInterface $client
    ) {
        $this->productRespository = $productRespository;
        $this->client = $client;
    }

    /**
     * @Route(
     *      name="api_b2b_post",
     *      path="/api/b2b-product/{label}/{manufacturerIdn}/{productId}",
     *      methods={"POST"},
     *      defaults={
     *          "_api_item_collection_name"="post_b2b_product",
     *      }
     * )
     */
    public function __invoke(Request $request, $label, $manufacturerIdn, $productId, SerializerInterface $serializer): JsonResponse
    {
        $manufacturerInfo = $this->productRespository->getInfo($manufacturerIdn);

        $OAuthRequest = new OAuthRequest();
//        $response = $OAuthRequest->request($this->client, 'GET', $manufacturerInfo['product_url'].$productId, []);
//        $response = json_decode($response->getContent(), true); # Contain B2B product info
//        dd($response);

        $jsonBody = <<<JSON
{
    "payment_method": "bacs",
    "payment_method_title": "Direct Bank Transfer",
    "set_paid": true,
    "billing": {
        "first_name": "John",
        "last_name": "Doe",
        "address_1": "969 Market",
        "address_2": "",
        "city": "San Francisco",
        "state": "CA",
        "postcode": "94103",
        "country": "US",
        "email": "john.doe@example.com",
        "phone": "(555) 555-5555"
    },
    "shipping": {
        "first_name": "John",
        "last_name": "Doe",
        "address_1": "969 Market",
        "address_2": "",
        "city": "San Francisco",
        "state": "CA",
        "postcode": "94103",
        "country": "US"
    },
    "line_items": [
        {
          "product_id": 38,
          "quantity": 1
        }
    ]
}
JSON;

        $response = $OAuthRequest->request(
            $this->client,
            'POST',
            $manufacturerInfo['order_url'],
            json_decode($jsonBody, true)
        );

        return $this->json(json_decode($response->getContent(), true), Response::HTTP_CREATED);
    }
}
