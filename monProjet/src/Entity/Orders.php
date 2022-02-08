<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="OrderID")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true, name="EmployeeID")
     */
    private $employeeID;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="OrderDate")
     */
    private $orderDate;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="RequireDate")
     */
    private $requireDate;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="orders")
     */
    private $orderDetails;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeID(): ?int
    {
        return $this->employeeID;
    }

    public function setEmployeeID(?int $employeeID): self
    {
        $this->employeeID = $employeeID;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(?\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getRequireDate(): ?\DateTimeInterface
    {
        return $this->requireDate;
    }

    public function setRequireDate(?\DateTimeInterface $requireDate): self
    {
        $this->requireDate = $requireDate;

        return $this;
    }

    /**
     * @return Collection|OrderDetails[]
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setOrders($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getOrders() === $this) {
                $orderDetail->setOrders(null);
            }
        }

        return $this;
    }
}
