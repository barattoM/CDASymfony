<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typesproduits
 *
 * @ORM\Table(name="typesproduits")
 * @ORM\Entity
 */
class Typesproduits
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdTypeProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeproduit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LibelleTypeProduit", type="string", length=100, nullable=true)
     */
    private $libelletypeproduit;

    public function getIdtypeproduit(): ?int
    {
        return $this->idtypeproduit;
    }

    public function getLibelletypeproduit(): ?string
    {
        return $this->libelletypeproduit;
    }

    public function setLibelletypeproduit(?string $libelletypeproduit): self
    {
        $this->libelletypeproduit = $libelletypeproduit;

        return $this;
    }


}
