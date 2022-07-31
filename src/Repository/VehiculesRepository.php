<?php

namespace App\Repository;

use Doctrine\ORM\EntityManagerInterface;

class VehiculesRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function findByCategoryId(int $id)
    {
        $cnx = $this->entityManager->getConnection();
        $sql = '
            SELECT * FROM vehicles 
            WHERE status = 1
            AND vehicle_category = :vc
        ';

        $stmt = $cnx->prepare($sql);
        $results = $stmt->executeQuery([
            'vc' => $id
        ]);

        return $results->fetchAllAssociative();
    }

    public function findById(int $id)
    {
        $cnx = $this->entityManager->getConnection();
        $sql = '
            SELECT * FROM vehicles 
            WHERE status = 1
            AND id = :id
        ';

        $stmt = $cnx->prepare($sql);
        $result = $stmt->executeQuery([
            'id' => $id
        ]);

        return $result->fetchAssociative();
    }
}