<?php

namespace App\Entity;

use App\Repository\PersonnesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnesRepository::class)
 */
class Personnes
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
    private $Prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $DDN;

    /**
     * @ORM\ManyToOne(targetEntity=Familles::class, inversedBy="personnes")
     */
    private $IdFamille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDDN(): ?\DateTimeInterface
    {
        return $this->DDN;
    }

    public function setDDN(\DateTimeInterface $DDN): self
    {
        $this->DDN = $DDN;

        return $this;
    }

    public function getIdFamille(): ?Familles
    {
        return $this->IdFamille;
    }

    public function setIdFamille(?Familles $IdFamille): self
    {
        $this->IdFamille = $IdFamille;

        return $this;
    }
}
