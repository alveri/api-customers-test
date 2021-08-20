<?php


namespace App\Service;


use App\DTO\CustomerDTO;
use App\Service\EntityManager\CustomerManager;
use Doctrine\ORM\EntityManagerInterface;

class CustomersImporter
{
    private RandomUserClient $client;
    private EntityManagerInterface $entityManager;
    private CustomerManager $customerManager;

    public function __construct(RandomUserClient $client, EntityManagerInterface $entityManager, CustomerManager $customerManager)
    {
        $this->client = $client;
        $this->entityManager = $entityManager;
        $this->customerManager = $customerManager;
    }

    public function import(string $country, int $numberToImport)
    {
        $customersData = $this->client->getCustomers($country, $numberToImport);
        foreach ($customersData as $customerData) {
            $customerDTO = new CustomerDTO(
                sprintf('%s %s %s', $customerData['name']['title'], $customerData['name']['first'], $customerData['name']['last']),
                $customerData['email'],
                $customerData['location']['country'],
                $customerData['login']['username'],
                $customerData['gender'],
                $customerData['location']['city'],
                $customerData['phone'],
            );
            $this->customerManager->processDTO($customerDTO);
        }

        $this->entityManager->flush();
    }
}
