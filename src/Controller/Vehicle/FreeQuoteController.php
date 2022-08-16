<?php

namespace App\Controller\Vehicle;

use ApiPlatform\Core\Exception\InvalidArgumentException;
use App\ApiResources\Vehicle;
use App\Dto\FreeQuote;
use App\Repository\VehiculesRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FreeQuoteController extends AbstractController
{
    private $vehiculesRepository;

    public function __construct(VehiculesRepository $vehiculesRepository)
    {
        $this->vehiculesRepository = $vehiculesRepository;
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
        $freeQuoteResponse = $this->getFreeQuote($freeQuoteObj, (int) $id);

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

    private function getFreeQuote(FreeQuote $freeQuote, int $id): array
    {
        $vehicle = $this->vehiculesRepository->findById($id);
        if (!$vehicle) {
            throw new InvalidArgumentException('id is invalid !');
        }

        $pickUpDate = new DateTime($freeQuote->getPickUpDate());
        $dropOffDate = new DateTime($freeQuote->getDropOffDate());
        $dateDiffDays = $dropOffDate->diff($pickUpDate)->days;
        $price = (int) $vehicle['price'];
        $total = $price * $dateDiffDays;
        $amountToPay = (1 / 4) * $total;
        $remaining = $total - $amountToPay;

        return [
            'days' => $dateDiffDays,
            'condition' => 'Pay 25% of total upon booking',
            'price_per_day' => $price,
            'total' => $total,
            'pay' => $amountToPay,
            'remaining' => $remaining,
        ];
    }
}
