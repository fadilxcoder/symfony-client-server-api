<?php

namespace App\Controller\Vehicle;

use App\ApiResources\Vehicle;
use App\Dto\FreeQuote;
use App\Util\FreeQuoteCalc;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FreeQuoteController extends AbstractController
{
    private $freeQuoteCalc;

    public function __construct(FreeQuoteCalc $freeQuoteCalc)
    {
        $this->freeQuoteCalc = $freeQuoteCalc;
    }

    /**
     * @Route(
     *      name="api_free_quote_post",
     *      path="/api/vehicle/rental-quote/{id}",
     *      methods={"POST"},
     *      defaults={
     *          "_api_resource_class"=Vehicle::class,
     *          "_api_item_collection_name"="post_rental_quote",
     *      }
     * )
     */
    public function __invoke(Request $request, $id, SerializerInterface $serializer): JsonResponse
    {
        $freeQuoteObj = $serializer->deserialize($request->getContent(), FreeQuote::class, 'json');
        $freeQuoteResponse = $this->freeQuoteCalc->getFreeQuote($freeQuoteObj, (int) $id);

        if ($freeQuoteResponse) {
            return $this->json([
                'days' => $freeQuoteResponse['days'],
                'condition' => $freeQuoteResponse['condition'],
                'price_per_day' => $freeQuoteResponse['price_per_day'],
                'total' => $freeQuoteResponse['total'],
                'pay' => $freeQuoteResponse['pay'],
                'remaining' => $freeQuoteResponse['remaining'],
            ], Response::HTTP_OK);
        }
    }
}
