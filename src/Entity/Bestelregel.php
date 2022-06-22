<?php

namespace App\Entity;

use App\Repository\BestelregelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BestelregelRepository::class)
 */
class Bestelregel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    /**
     * @ORM\ManyToOne(targetEntity=Bestelling::class, inversedBy="bestelregelId")
     */
    private $bestelling;

    /**
     * @ORM\ManyToOne(targetEntity=Pizza::class, inversedBy="bestelregels")
     */
    private $pizzaId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getBestelling(): ?Bestelling
    {
        return $this->bestelling;
    }

    public function setBestelling(?Bestelling $bestelling): self
    {
        $this->bestelling = $bestelling;

        return $this;
    }

    public function getPizzaId(): ?Pizza
    {
        return $this->pizzaId;
    }

    public function setPizzaId(?Pizza $pizzaId): self
    {
        $this->pizzaId = $pizzaId;

        return $this;
    }
}
