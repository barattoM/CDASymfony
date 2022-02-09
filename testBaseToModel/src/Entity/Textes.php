<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Textes
 *
 * @ORM\Table(name="textes")
 * @ORM\Entity
 */
class Textes
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTexte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtexte;

    /**
     * @var string
     *
     * @ORM\Column(name="codeTexte", type="string", length=50, nullable=false)
     */
    private $codetexte;

    /**
     * @var string
     *
     * @ORM\Column(name="fr", type="text", length=0, nullable=false)
     */
    private $fr;

    /**
     * @var string
     *
     * @ORM\Column(name="en", type="text", length=0, nullable=false)
     */
    private $en;

    public function getIdtexte(): ?int
    {
        return $this->idtexte;
    }

    public function getCodetexte(): ?string
    {
        return $this->codetexte;
    }

    public function setCodetexte(string $codetexte): self
    {
        $this->codetexte = $codetexte;

        return $this;
    }

    public function getFr(): ?string
    {
        return $this->fr;
    }

    public function setFr(string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(string $en): self
    {
        $this->en = $en;

        return $this;
    }


}
