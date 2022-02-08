<?php

namespace App\Entity;

use App\Repository\OrderDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderDetailsRepository::class)
 */
class OrderDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=orders::class, inversedBy="orderDetails")
     * @ORM\JoinColumn(nullable=false , name="OrderID")
     */
    private $orders;

    /**
     * @ORM\ManyToOne(targetEntity=products::class, inversedBy="orderDetails")
     * @ORM\JoinColumn(nullable=false , name="ProductID")
     */
    private $productID;

    /**
     * @ORM\Column(type="float" , name="UnitPrice")
     */
    private $unitPrice;

    /**
     * @ORM\Column(type="integer" , name="Quantity")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float" , name="Discount")
     */
    private $discount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrders(): ?orders
    {
        return $this->orders;
    }

    public function setOrders(?orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProductID(): ?products
    {
        return $this->productID;
    }

    public function setProductID(?products $productID): self
    {
        $this->productID = $productID;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }
}
