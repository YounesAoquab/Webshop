<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurregelRepository")
 */
class Factuurregel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuur", inversedBy="factuurregels")
     */
    private $Factuurnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Productcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Productaantal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurnummer(): ?Factuur
    {
        return $this->Factuurnummer;
    }

    public function setFactuurnummer(?Factuur $Factuurnummer): self
    {
        $this->Factuurnummer = $Factuurnummer;

        return $this;
    }

    public function getProductcode(): ?string
    {
        return $this->Productcode;
    }

    public function setProductcode(string $Productcode): self
    {
        $this->Productcode = $Productcode;

        return $this;
    }

    public function getProductaantal(): ?string
    {
        return $this->Productaantal;
    }

    public function setProductaantal(string $Productaantal): self
    {
        $this->Productaantal = $Productaantal;

        return $this;
    }
    public function __toString() {
        return $this -> getNaam();
    }

}
