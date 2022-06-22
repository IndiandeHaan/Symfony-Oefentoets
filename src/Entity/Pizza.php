<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PizzaRepository::class)
 */
class Pizza
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
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Bestelregel::class, mappedBy="pizzaId")
     */
    private $bestelregels;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="pizzas")
     */
    private $categoryId;

    public function __construct()
    {
        $this->bestelregels = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Bestelregel>
     */
    public function getBestelregels(): Collection
    {
        return $this->bestelregels;
    }

    public function addBestelregel(Bestelregel $bestelregel): self
    {
        if (!$this->bestelregels->contains($bestelregel)) {
            $this->bestelregels[] = $bestelregel;
            $bestelregel->setPizzaId($this);
        }

        return $this;
    }

    public function removeBestelregel(Bestelregel $bestelregel): self
    {
        if ($this->bestelregels->removeElement($bestelregel)) {
            // set the owning side to null (unless already changed)
            if ($bestelregel->getPizzaId() === $this) {
                $bestelregel->setPizzaId(null);
            }
        }

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->categoryId;
    }

    public function setCategoryId(?Category $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}
