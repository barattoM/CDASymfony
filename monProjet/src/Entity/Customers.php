<?php

namespace App\Entity;

use App\Repository\CustomersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomersRepository::class)
 */
class Customers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="CustomerId")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40 , name="CompanyName")
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=30, nullable=true, name="ContactName")
     */
    private $contactName;

    /**
     * @ORM\Column(type="string", length=30, nullable=true, name="ContactTitle")
     */
    private $contactTitle;

    /**
     * @ORM\Column(type="string", length=60, nullable=true , name="Address")
     */
    private $Address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(?string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(?string $contactTitle): self
    {
        $this->contactTitle = $contactTitle;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(?string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }
}
