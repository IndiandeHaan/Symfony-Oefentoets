<?php

namespace App\Entity;

use App\Repository\BestellingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BestellingRepository::class)
 */
class Bestelling
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
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Klant::class, inversedBy="bestellingId")
     */
    private $klant;

    /**
     * @ORM\OneToMany(targetEntity=Bestelregel::class, mappedBy="bestelling")
     */
    private $bestelregelId;

    public function __construct()
    {
        $this->bestelregelId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?string
    {
        return $this->datum;
    }

    public function setDatum(string $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getKlant(): ?Klant
    {
        return $this->klant;
    }

    public function setKlant(?Klant $klant): self
    {
        $this->klant = $klant;

        return $this;
    }

    /**
     * @return Collection<int, Bestelregel>
     */
    public function getBestelregelId(): Collection
    {
        return $this->bestelregelId;
    }

    public function addBestelregelId(Bestelregel $bestelregelId): self
    {
        if (!$this->bestelregelId->contains($bestelregelId)) {
            $this->bestelregelId[] = $bestelregelId;
            $bestelregelId->setBestelling($this);
        }

        return $this;
    }

    public function removeBestelregelId(Bestelregel $bestelregelId): self
    {
        if ($this->bestelregelId->removeElement($bestelregelId)) {
            // set the owning side to null (unless already changed)
            if ($bestelregelId->getBestelling() === $this) {
                $bestelregelId->setBestelling(null);
            }
        }

        return $this;
    }
}
