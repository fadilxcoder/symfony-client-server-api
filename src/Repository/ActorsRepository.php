<?php

namespace App\Repository;

use Doctrine\ORM\EntityManagerInterface;

class ActorsRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll()
    {
        $cnx = $this->entityManager->getConnection();
        $sql = '
            SELECT * FROM actor 
        ';

        $stmt = $cnx->prepare($sql);
        $results = $stmt->executeQuery([]);

        return $results->fetchAllAssociative();
    }
}
