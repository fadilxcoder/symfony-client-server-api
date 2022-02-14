<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Controller\RandomUserController;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={
 *          "get"={
 *             "path"="/random-user/{id}",
 *             "controller"=RandomUserController::class,
 *             "read"=false,
 *             "output"=false,
 *         }
 *     }
 * )
 */
class RandomUser
{
    private $id;
}