<?php

namespace App\Repository\B2B;

interface ManufacturerRespositoryInterface
{
    public function getInfo(string $idn): ?array;
}