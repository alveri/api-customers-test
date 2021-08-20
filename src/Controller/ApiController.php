<?php


namespace App\Controller;


use App\Entity\Customer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/apiasdad/customers/")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api_customers_list")
     */
    public function list()
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

    }
}
