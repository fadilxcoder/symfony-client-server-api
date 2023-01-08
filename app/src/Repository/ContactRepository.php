<?php

namespace App\Repository;

use App\Dto\CreateContact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class ContactRepository
{
    public function __construct(private EntityManagerInterface $entityManager, private RequestStack $requestStack)
    {
    }

    public function persist(CreateContact $contact)
    {
        $ip = (null !== $this->requestStack->getCurrentRequest())
            ? $this->requestStack->getCurrentRequest()->getClientIp()
            : null
        ;

        $cnx = $this->entityManager->getConnection();
        $sql = '
            INSERT INTO contact (fname, email, phone, msg, ip_addr) 
            VALUES (:fname, :email, :phone, :msg, :ip_addr)
        ';

        $stmt = $cnx->prepare($sql);
        $stmt->bindValue(':fname', $contact->getFullName());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':phone', $contact->getPhone());
        $stmt->bindValue(':msg', $contact->getMessage());
        $stmt->bindValue(':ip_addr', $ip);

        $stmt->executeStatement();

        return $cnx->lastInsertId();
    }
}
