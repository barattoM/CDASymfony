<?php

namespace App\Entity;

use App\Repository\FamillesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamillesRepository::class)
 */
class Familles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity=Personnes::class, mappedBy="IdFamille")
     */
    private $personnes;

    public function __construct()
    {
        $this->personnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection|Personnes[]
     */
    public function getPersonnes(): Collection
    {
        return $this->personnes;
    }

    public function addPersonne(Personnes $personne): self
    {
        if (!$this->personnes->contains($personne)) {
            $this->personnes[] = $personne;
            $personne->setIdFamille($this);
        }

        return $this;
    }

    public function removePersonne(Personnes $personne): self
    {
        if ($this->personnes->removeElement($personne)) {
            // set the owning side to null (unless already changed)
            if ($personne->getIdFamille() === $this) {
                $personne->setIdFamille(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

}
