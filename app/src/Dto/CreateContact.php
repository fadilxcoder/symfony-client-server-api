<?php

namespace App\Dto;

class CreateContact
{
    /**
     * @var string|null
     */
    private $fullName;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @var string|null
     */
    private $ipAddress;

    public function __construct(?string $fullName, ?string $phone, ?string $email, ?string $message, ?string $ipAddress)
    {
        $this->fullName = $fullName;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
        $this->ipAddress = $ipAddress;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }
}
