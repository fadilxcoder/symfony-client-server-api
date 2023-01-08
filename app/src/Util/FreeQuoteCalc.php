<?php

namespace App\Util;

use ApiPlatform\Core\Exception\InvalidArgumentException;
use App\Dto\Booking;
use App\Dto\FreeQuote;
use App\Repository\VehiculesRepository;
use DateTime;

class FreeQuoteCalc
{
    private $vehiculesRepository;

    public function __construct(VehiculesRepository $vehiculesRepository)
    {
        $this->vehiculesRepository = $vehiculesRepository;
    }

    public function getFreeQuote(FreeQuote $freeQuote, int $id): array
    {
        $vehicle = $this->vehiculesRepository->findById($id);
        if (!$vehicle) {
            throw new InvalidArgumentException('id is invalid !');
        }

        return $this->calculate([
            'pick_up_date' => $freeQuote->getPickUpDate(),
            'drop_off_date' => $freeQuote->getDropOffDate(),
            'price' => $vehicle['price'],
        ]);

    }

    public function getBooking(Booking $booking, int $id): array
    {
        $vehicle = $this->vehiculesRepository->findById($id);
        if (!$vehicle) {
            throw new InvalidArgumentException('id is invalid !');
        }

        return $this->calculate([
            'pick_up_date' => $booking->getPickUpDate(),
            'drop_off_date' => $booking->getDropOffDate(),
            'price' => $vehicle['price'],
        ]);
    }

    private function calculate(array $input): array
    {
        $pickUpDate = new DateTime($input['pick_up_date']);
        $dropOffDate = new DateTime($input['drop_off_date']);
        $dateDiffDays = $dropOffDate->diff($pickUpDate)->days;
        $price = (int) $input['price'];
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
