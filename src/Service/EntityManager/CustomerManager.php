<?php


namespace App\Service\EntityManager;


use App\DTO\CustomerDTO;
use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;

class CustomerManager
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function processDTO(CustomerDTO $customerDTO): Customer
    {
        $customer = $this->entityManager
            ->getRepository(Customer::class)
            ->findOneBy([
                'fullName' => $customerDTO->fullName,
                'emailAddress' => $customerDTO->emailAddress,
                'userName' => $customerDTO->userName,
            ]);

        if (is_null($customer)) {
            $customer = new Customer();
            $customer->setFullName($customerDTO->fullName);
            $customer->setEmailAddress($customerDTO->emailAddress);
            $customer->setUserName($customerDTO->userName);
            $this->entityManager->persist($customer);
        }

        $customer->setCity($customerDTO->city);
        $customer->setGender($customerDTO->gender);
        $customer->setCountry($customerDTO->country);
        $customer->setPhone($customerDTO->phone);

        return $customer;
    }
}
