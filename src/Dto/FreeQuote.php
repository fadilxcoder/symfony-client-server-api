<?php

namespace App\Dto;

class FreeQuote
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

    public function __construct(
        ?string $pickUpDate,
        ?string $pickUpTime,
        ?string $pickUpLocation,
        ?string $dropOffDate,
        ?string $dropOffTime,
        ?string $dropOffLocation
    ) {
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
}
