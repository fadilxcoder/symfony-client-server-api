<?php

namespace App\Controller\Vehicle;

use App\ApiResources\Vehicle;
use App\Dto\Booking as BookingDTO;
use App\Repository\VehiculesRepository;
use App\Util\FreeQuoteCalc;
use App\ValueObject\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BookingController extends AbstractController
{
    private $freeQuoteCalc;

    private $vehiculesRepository;

    public function __construct(FreeQuoteCalc $freeQuoteCalc, VehiculesRepository $vehiculesRepository)
    {
        $this->freeQuoteCalc = $freeQuoteCalc;
        $this->vehiculesRepository = $vehiculesRepository;
    }

    /**
     * @Route(
     *      name="api_booking_post",
     *      path="/api/vehicle/book-now/{id}",
     *      methods={"POST"},
     *      defaults={
     *          "_api_resource_class"=Vehicle::class,
     *          "_api_item_collection_name"="post_post_book_now",
     *      }
     * )
     */
    public function __invoke(Request $request, $id, SerializerInterface $serializer): JsonResponse
    {
        $bookingObj = $serializer->deserialize($request->getContent(), BookingDTO::class, 'json');
        $BookingCalcArr = $this->freeQuoteCalc->getBooking($bookingObj, (int) $id);
        $ref = 'FA-'.date('dmY').'-'.uniqid('', true);

        $booking = Booking::fromState([
            'ref_number' => $ref,
            'ip_addr' => '-',
            'fname' => $bookingObj->getFullName(),
            'email' => $bookingObj->getEmail(),
            'country' => $bookingObj->getCountry(),
            'phone' => $bookingObj->getPhoneNumber(),
            'total' => $BookingCalcArr['total'],
            'pay_now' => $BookingCalcArr['pay'],
            'pay_later' => $BookingCalcArr['remaining'],
            'pick_up_loc' => $bookingObj->getPickUpLocation(),
            'date_pickup' => $bookingObj->getPickUpDate(),
            'time_pickup' => $bookingObj->getPickUpTime(),
            'date_drop_off' => $bookingObj->getDropOffDate(),
            'drop_off_location' => $bookingObj->getDropOffLocation(),
            'drop_off_time' => $bookingObj->getDropOffTime(),
            'vehicle_id' => $id,
            'vehicle_image' => '-',
            'other_details' => $bookingObj->getOtherDetails(),
        ]);

        $this->vehiculesRepository->persist($booking);

        return $this->json([
            'days' => $BookingCalcArr['days'],
            'condition' => 'Pay 25% of total upon booking',
            'price_per_day' => $BookingCalcArr['price_per_day'],
            'total' => $BookingCalcArr['total'],
            'pay' => $BookingCalcArr['pay'],
            'remaining' => $BookingCalcArr['remaining'],
            'email' => $bookingObj->getEmail(),
            'reference_id' => $ref,
        ], Response::HTTP_OK);
    }
}
