<?php

namespace App\Repository;

use App\ValueObject\Booking;
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
            'vc' => $id,
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
            'id' => $id,
        ]);

        return $result->fetchAssociative();
    }

    public function persist(Booking $booking)
    {
        $cnx = $this->entityManager->getConnection();
        $sql = '
            INSERT INTO `booking` (
                `ref_number`, 
                `ip_addr`, 
                `fname`, 
                `email`, 
                `country`, 
                `phone`, 
                `total`, 
                `pay_now`, 
                `pay_later`, 
                `pick_up_loc`, 
                `date_pickup`,
                `time_pickup`, 
                `date_drop_off`, 
                `drop_off_location`, 
                `drop_off_time`, 
                `vehicle_id`, 
                `vehicle_image`, 
                `other_details`
           ) VALUES (
                :ref_number, 
                :ip_addr, 
                :fname, 
                :email, 
                :country, 
                :phone, 
                :total, 
                :pay_now, 
                :pay_later, 
                :pick_up_loc, 
                :date_pickup, 
                :time_pickup, 
                :date_drop_off, 
                :drop_off_location, 
                :drop_off_time, 
                :vehicle_id, 
                :vehicle_image,
                :other_details
            );
        ';

        $stmt = $cnx->prepare($sql);
        $result = $stmt->executeQuery($booking->toState());

        return $result;
    }
}
