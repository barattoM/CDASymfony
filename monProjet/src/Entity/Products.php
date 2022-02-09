<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Products
{ 
    
    /**
     * @ORM\Column(name="ProductID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /** 
    * @ORM\Column(name="productName", type="string", nullable=false, length = 40)
    */
    private $name;

    

    /** 
    * @ORM\Column(name="CategoryID", type="integer", options={"default" : null})
    */
    private $categoryID;

    /** 
    * @ORM\Column(name="QuantityPerUnit", type="string", length=20, options={"default" : null})
    */
    private $quantityPerUnit;

    /** 
    * @ORM\Column(name="UnitPrice", type="float", options={"default" : 0,0000})
    */
    private $unitPrice;    
    
    /** 
    * @ORM\Column(name="UnitsInStock", type="integer", options={"default" : 0})
    */
    private $unitsInStock;

    /** 
    * @ORM\Column(name="UnitsOnOrder", type="integer", options={"default" : 0})
    */
    private $unitsOnOrder;

    /** 
    * @ORM\Column(name="ReorderLevel", type="integer", options={"default" : 0})
    */
    private $reorderLevel;

    /** 
    * @ORM\Column(name="Discontinued", type="boolean", nullable=false, options={"default" : 0})
    */
    private $discontinued;

    /** 
     * @var \Suppliers
     * 
     * @ORM\ManyToOne(targetEntity="Suppliers" , fetch="EAGER" , inversedBy="products")
     * @ORM\JoinColumn(name="SupplierId", referencedColumnName="SupplierId")
    */
    private $suppliers;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="productID")
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

    
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }


    public function getCategoryID(): ?int
    {
        return $this->categoryID;
    }

    public function setCategoryID(int $categoryID): self
    {
        $this->categoryID = $categoryID;
        return $this;
    }

    public function getQuantityPerUnit(): ?string
    {
        return $this->quantityPerUnit;
    }

    public function setQuantityperUnit(string $quantityPerUnit): self
    {
        $this->quantityPerUnit = $quantityPerUnit;
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

    public function getUnitsInStock(): ?int
    {
        return $this->unitsInStock;
    }

    public function setUnitsInStock(int $unitsInStock): self
    {
        $this->unitsInStock = $unitsInStock;
        return $this;
    }

    public function getUnitsOnOrder(): ?int
    {
        return $this->unitsOnOrder;
    }

    public function setUnitsOnOrder(int $unitsOnOrder): self
    {
        $this->unitsOnOrder = $unitsOnOrder;
        return $this;
    }

    public function getReorderLevel(): ?int
    {
        return $this->reorderLevel;
    }
    
    public function setReorderLevel(int $reorderLevel): self
    {
        $this->reorderLevel = $reorderLevel;
        return $this;
    }

    public function getDiscontinued(): ?bool
    {
        return $this->discontinued;
    }

    public function setDiscontinued(bool $discontinued): self
    {
        $this->discontinued = $discontinued;
        return $this;
    }

    public function getSuppliers(){
        return $this->suppliers;
    }

    public function setSuppliers(?Suppliers $supplier) : self{
        $this->suppliers=$supplier;
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
            $orderDetail->setProductID($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getProductID() === $this) {
                $orderDetail->setProductID(null);
            }
        }

        return $this;
    }

   

}
