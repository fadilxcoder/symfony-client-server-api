<?php

namespace App\Dto;

class Booking
{
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
    private $pickUpLocation;

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
    private $dropOffLocation;

    /**
     * @var string|null
     */
    private $fullName;

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
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $otherDetails;

    public function __construct(
        ?string $fullName,
        ?string $email,
        ?string $country,
        ?string $phoneNumber,
        ?string $otherDetails,
        ?string $pickUpDate,
        ?string $pickUpTime,
        ?string $pickUpLocation,
        ?string $dropOffDate,
        ?string $dropOffTime,
        ?string $dropOffLocation
    ) {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->country = $country;
        $this->phoneNumber = $phoneNumber;
        $this->otherDetails = $otherDetails;
        $this->pickUpDate = $pickUpDate;
        $this->pickUpTime = $pickUpTime;
        $this->pickUpLocation = $pickUpLocation;
        $this->dropOffDate = $dropOffDate;
        $this->dropOffTime = $dropOffTime;
        $this->dropOffLocation = $dropOffLocation;
    }

    public function getPickUpDate(): ?string
    {
        return $this->pickUpDate;
    }

    public function getPickUpTime(): ?string
    {
        return $this->pickUpTime;
    }

    public function getPickUpLocation(): ?string
    {
        return $this->pickUpLocation;
    }

    public function getDropOffDate(): ?string
    {
        return $this->dropOffDate;
    }

    public function getDropOffTime(): ?string
    {
        return $this->dropOffTime;
    }

    public function getDropOffLocation(): ?string
    {
        return $this->dropOffLocation;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getOtherDetails(): ?string
    {
        return $this->otherDetails;
    }
}
