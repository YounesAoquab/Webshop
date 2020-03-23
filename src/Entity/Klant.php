<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlantRepository")
 */
class Klant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Klantnaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Btwnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Plaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Postcode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factuur", mappedBy="Klantnummer")
     */
    private $factuurs;

    public function __construct()
    {
        $this->factuurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlantnaam(): ?string
    {
        return $this->Klantnaam;
    }

    public function setKlantnaam(string $Klantnaam): self
    {
        $this->Klantnaam = $Klantnaam;

        return $this;
    }

    public function getBtwnummer(): ?string
    {
        return $this->Btwnummer;
    }

    public function setBtwnummer(string $Btwnummer): self
    {
        $this->Btwnummer = $Btwnummer;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->Adres;
    }

    public function setAdres(string $Adres): self
    {
        $this->Adres = $Adres;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->Plaats;
    }

    public function setPlaats(string $Plaats): self
    {
        $this->Plaats = $Plaats;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->Postcode;
    }

    public function setPostcode(string $Postcode): self
    {
        $this->Postcode = $Postcode;

        return $this;
    }

    /**
     * @return Collection|Factuur[]
     */
    public function getFactuurs(): Collection
    {
        return $this->factuurs;
    }

    public function addFactuur(Factuur $factuur): self
    {
        if (!$this->factuurs->contains($factuur)) {
            $this->factuurs[] = $factuur;
            $factuur->setKlantnummer($this);
        }

        return $this;
    }

    public function removeFactuur(Factuur $factuur): self
    {
        if ($this->factuurs->contains($factuur)) {
            $this->factuurs->removeElement($factuur);
            // set the owning side to null (unless already changed)
            if ($factuur->getKlantnummer() === $this) {
                $factuur->setKlantnummer(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this -> getNaam();
    }

}
