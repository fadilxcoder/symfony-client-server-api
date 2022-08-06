<?php

namespace App\Dto;

class Token
{
    /**
     * @var string|null
     */
    private $clientId;

    public function __construct(?string $clientId)
    {
        $this->clientId = $clientId;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }
}
