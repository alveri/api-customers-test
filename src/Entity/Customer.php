<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ORM\Table(name="customers")
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="customer:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="customer:item"}}},
 *     order={"id"="ASC"},
 *     paginationEnabled=false
 * )
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"customer:list", "customer:item"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:list", "customer:item"})
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:list", "customer:item"})
     */
    private $emailAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:list", "customer:item"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:item"})
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:item"})
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:item"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customer:item"})
     */
    private $phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
