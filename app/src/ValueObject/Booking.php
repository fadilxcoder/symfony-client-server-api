<?php

namespace App\ValueObject;

class Booking
{
    /**
     * @var string|null
     */
    private $refNumber;

    /**
     * @var string|null
     */
    private $ipAddr;

    /**
     * @var string|null
     */
    private $fname;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $total;

    /**
     * @var string|null
     */
    private $payNow;

    /**
     * @var string|null
     */
    private $payLater;

    /**
     * @var string|null
     */
    private $pickUpLocation;

    /**
     * @var string|null
     */
    private $pickUpDate;

    /**
     * @var string|null
     */
    private $pickUpTime;

    /**
     * @var string|null
     */
    private $dropOffLocation;

    /**
     * @var string|null
     */
    private $dropOffDate;

    /**
     * @var string|null
     */
    private $dropOffTime;

    /**
     * @var string|null
     */
    private $vehicleId;

    /**
     * @var string|null
     */
    private $vehicleImage;

    /**
     * @var string|null
     */
    private $otherDetails;

    public function __construct(
        ?string $refNumber,
        ?string $ipAddr,
        ?string $fname,
        ?string $email,
        ?string $country,
        ?string $phone,
        ?string $total,
        ?string $payNow,
        ?string $payLater,
        ?string $pickUpLocation,
        ?string $pickUpDate,
        ?string $pickUpTime,
        ?string $dropOffLocation,
        ?string $dropOffDate,
        ?string $dropOffTime,
        ?string $vehicleId,
        ?string $vehicleImage,
        ?string $otherDetails
    ) {
        $this->refNumber = $refNumber;
        $this->ipAddr = $ipAddr;
        $this->fname = $fname;
        $this->email = $email;
        $this->country = $country;
        $this->phone = $phone;
        $this->total = $total;
        $this->payNow = $payNow;
        $this->payLater = $payLater;
        $this->pickUpLocation = $pickUpLocation;
        $this->pickUpDate = $pickUpDate;
        $this->pickUpTime = $pickUpTime;
        $this->dropOffLocation = $dropOffLocation;
        $this->dropOffDate = $dropOffDate;
        $this->dropOffTime = $dropOffTime;
        $this->vehicleId = $vehicleId;
        $this->vehicleImage = $vehicleImage;
        $this->otherDetails = $otherDetails;
    }

    public static function fromState(array $booking): self
    {
        $refNumber = $booking['ref_number'];
        $ipAddr = $booking['ip_addr'];
        $fullname = $booking['fname'];
        $email = $booking['email'];
        $country = $booking['country'];
        $phone = $booking['phone'];
        $total = $booking['total'];
        $payNow = $booking['pay_now'];
        $payLater = $booking['pay_later'];
        $pickUpLoc = $booking['pick_up_loc'];
        $datePickup = $booking['date_pickup'];
        $timePickup = $booking['time_pickup'];
        $dateDropOff = $booking['date_drop_off'];
        $dropOffLocation = $booking['drop_off_location'];
        $dropOffTime = $booking['drop_off_time'];
        $vehicleId = $booking['vehicle_id'];
        $vehicleImage = $booking['vehicle_image'];
        $otherDetails = $booking['other_details'];

        return new self(
            $refNumber,
            $ipAddr,
            $fullname,
            $email,
            $country,
            $phone,
            $total,
            $payNow,
            $payLater,
            $pickUpLoc,
            $datePickup,
            $timePickup,
            $dropOffLocation,
            $dateDropOff,
            $dropOffTime,
            $vehicleId,
            $vehicleImage,
            $otherDetails
        );
    }

    public function toState(): array
    {
        return [
            'ref_number' => $this->getRefNumber(),
            'ip_addr' => $this->getIpAddr(),
            'fname' => $this->getFname(),
            'email' => $this->getEmail(),
            'country' => $this->getCountry(),
            'phone' => $this->getPhone(),
            'total' => $this->getTotal(),
            'pay_now' => $this->getPayNow(),
            'pay_later' => $this->getPayLater(),
            'pick_up_loc' => $this->getPickUpLocation(),
            'date_pickup' => $this->getPickUpDate(),
            'time_pickup' => $this->getPickUpTime(),
            'date_drop_off' => $this->getDropOffDate(),
            'drop_off_location' => $this->getDropOffLocation(),
            'drop_off_time' => $this->getDropOffTime(),
            'vehicle_id' => $this->getVehicleId(),
            'vehicle_image' => $this->getVehicleImage(),
            'other_details' => $this->getOtherDetails(),
        ];
    }

    public function getRefNumber(): ?string
    {
        return $this->refNumber;
    }

    public function getIpAddr(): ?string
    {
        return $this->ipAddr;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function getPayNow(): ?string
    {
        return $this->payNow;
    }

    public function getPayLater(): ?string
    {
        return $this->payLater;
    }

    public function getPickUpLocation(): ?string
    {
        return $this->pickUpLocation;
    }

    public function getPickUpDate(): ?string
    {
        return $this->pickUpDate;
    }

    public function getPickUpTime(): ?string
    {
        return $this->pickUpTime;
    }

    public function getDropOffLocation(): ?string
    {
        return $this->dropOffLocation;
    }

    public function getDropOffDate(): ?string
    {
        return $this->dropOffDate;
    }

    public function getDropOffTime(): ?string
    {
        return $this->dropOffTime;
    }

    public function getVehicleId(): ?string
    {
        return $this->vehicleId;
    }

    public function getVehicleImage(): ?string
    {
        return $this->vehicleImage;
    }

    public function getOtherDetails(): ?string
    {
        return $this->otherDetails;
    }
}
