<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="IdCategorie", columns={"IdCategorie"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleArticle", type="string", length=100, nullable=false)
     */
    private $libellearticle;

    /**
     * @var int
     *
     * @ORM\Column(name="QuantiteStockee", type="integer", nullable=false)
     */
    private $quantitestockee;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdCategorie", referencedColumnName="IdCategorie")
     * })
     */
    private $idcategorie;

    public function getIdarticle(): ?int
    {
        return $this->idarticle;
    }

    public function getLibellearticle(): ?string
    {
        return $this->libellearticle;
    }

    public function setLibellearticle(string $libellearticle): self
    {
        $this->libellearticle = $libellearticle;

        return $this;
    }

    public function getQuantitestockee(): ?int
    {
        return $this->quantitestockee;
    }

    public function setQuantitestockee(int $quantitestockee): self
    {
        $this->quantitestockee = $quantitestockee;

        return $this;
    }

    public function getIdcategorie(): ?Categories
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(?Categories $idcategorie): self
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }


}
