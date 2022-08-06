<?php

namespace App\Services;

use App\Dto\Token;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SecurityToken
{
    private $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function getToken(): string
    {
        return md5($this->parameterBag->get('client'));
    }

    public function verifyClient(Token $token): bool
    {
        return md5($token->getClientId()) === md5($this->parameterBag->get('client'));
    }
}
