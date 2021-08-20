<?php


namespace App\DTO;


class CustomerDTO
{
    public ?string $fullName;
    public ?string $emailAddress;
    public ?string $country;
    public ?string $userName;
    public ?string $gender;
    public ?string $city;
    public ?string $phone;

    public function __construct(
        ?string $fullName,
        ?string $emailAddres,
        ?string $country,
        ?string $userName,
        ?string $gender,
        ?string $city,
        ?string $phone
    )
    {
        $this->fullName = $fullName;
        $this->emailAddress = $emailAddres;
        $this->country = $country;
        $this->userName = $userName;
        $this->gender = $gender;
        $this->city = $city;
        $this->phone = $phone;
    }
}
