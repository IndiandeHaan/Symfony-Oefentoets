<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KlantRepository::class)
 */
class Klant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $woonplaats;

    /**
     * @ORM\OneToMany(targetEntity=Bestelling::class, mappedBy="klant")
     */
    private $bestellingId;

    public function __construct()
    {
        $this->bestellingId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    /**
     * @return Collection<int, Bestelling>
     */
    public function getBestellingId(): Collection
    {
        return $this->bestellingId;
    }

    public function addBestellingId(Bestelling $bestellingId): self
    {
        if (!$this->bestellingId->contains($bestellingId)) {
            $this->bestellingId[] = $bestellingId;
            $bestellingId->setKlant($this);
        }

        return $this;
    }

    public function removeBestellingId(Bestelling $bestellingId): self
    {
        if ($this->bestellingId->removeElement($bestellingId)) {
            // set the owning side to null (unless already changed)
            if ($bestellingId->getKlant() === $this) {
                $bestellingId->setKlant(null);
            }
        }

        return $this;
    }
}
