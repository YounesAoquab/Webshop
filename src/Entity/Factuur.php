<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
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
    private $Factuurnummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuurs")
     */
    private $Klantnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Factuurdatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Vervaldatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Inzakeopdracht;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Korting;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factuurregel", mappedBy="Factuurnummer")
     */
    private $factuurregels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="Productcode")
     */
    private $products;

    public function __construct()
    {
        $this->factuurregels = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurnummer(): ?string
    {
        return $this->Factuurnummer;
    }

    public function setFactuurnummer(string $Factuurnummer): self
    {
        $this->Factuurnummer = $Factuurnummer;

        return $this;
    }

    public function getKlantnummer(): ?Klant
    {
        return $this->Klantnummer;
    }

    public function setKlantnummer(?Klant $Klantnummer): self
    {
        $this->Klantnummer = $Klantnummer;

        return $this;
    }

    public function getFactuurdatum(): ?string
    {
        return $this->Factuurdatum;
    }

    public function setFactuurdatum(string $Factuurdatum): self
    {
        $this->Factuurdatum = $Factuurdatum;

        return $this;
    }

    public function getVervaldatum(): ?string
    {
        return $this->Vervaldatum;
    }

    public function setVervaldatum(string $Vervaldatum): self
    {
        $this->Vervaldatum = $Vervaldatum;

        return $this;
    }

    public function getInzakeopdracht(): ?string
    {
        return $this->Inzakeopdracht;
    }

    public function setInzakeopdracht(string $Inzakeopdracht): self
    {
        $this->Inzakeopdracht = $Inzakeopdracht;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->Korting;
    }

    public function setKorting(string $Korting): self
    {
        $this->Korting = $Korting;

        return $this;
    }

    /**
     * @return Collection|Factuurregel[]
     */
    public function getFactuurregels(): Collection
    {
        return $this->factuurregels;
    }

    public function addFactuurregel(Factuurregel $factuurregel): self
    {
        if (!$this->factuurregels->contains($factuurregel)) {
            $this->factuurregels[] = $factuurregel;
            $factuurregel->setFactuurnummer($this);
        }

        return $this;
    }

    public function removeFactuurregel(Factuurregel $factuurregel): self
    {
        if ($this->factuurregels->contains($factuurregel)) {
            $this->factuurregels->removeElement($factuurregel);
            // set the owning side to null (unless already changed)
            if ($factuurregel->getFactuurnummer() === $this) {
                $factuurregel->setFactuurnummer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setProductcode($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getProductcode() === $this) {
                $product->setProductcode(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this -> getNaam();
    }

}
