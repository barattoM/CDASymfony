<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Categories
 *
 * @ORM\Table(name="categories", indexes={@ORM\Index(name="IdTypeProduit", columns={"IdTypeProduit"})})
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdCategorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleCategorie", type="string", length=100, nullable=false)
     */
    private $libellecategorie;

    /**
     * @var \Typesproduits
     *
     * @ORM\ManyToOne(targetEntity="Typesproduits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdTypeProduit", referencedColumnName="IdTypeProduit")
     * })
     */
    private $idtypeproduit;

    /**
     * @ORM\OneToMany(targetEntity="Articles",mappedBy="Categories",orphanRemoval=true)
     * })
     */
    private $articles;

    public function getArticles(): Collection
    { 
        return $this->articles; 
    }

    public function addProducts(Articles $articles): self 
    { 
        if(!$this->articles->contains($articles)){
            $this->articles[] = $articles;
            $articles->setIdcategorie($this);
        }
        return $this;
    }

    public function getIdcategorie(): ?int
    {
        return $this->idcategorie;
    }

    public function getLibellecategorie(): ?string
    {
        return $this->libellecategorie;
    }

    public function setLibellecategorie(string $libellecategorie): self
    {
        $this->libellecategorie = $libellecategorie;

        return $this;
    }

    public function getIdtypeproduit(): ?Typesproduits
    {
        return $this->idtypeproduit;
    }

    public function setIdtypeproduit(?Typesproduits $idtypeproduit): self
    {
        $this->idtypeproduit = $idtypeproduit;

        return $this;
    }


}
