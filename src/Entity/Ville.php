<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_ville = null;

    #[ORM\OneToMany(mappedBy: 'ville', targetEntity: Stade::class, orphanRemoval: true)]
    private Collection $stades;

    public function __construct()
    {
        $this->stades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVille(): ?string
    {
        return $this->nom_ville;
    }

    public function setNomVille(string $nom_ville): self
    {
        $this->nom_ville = $nom_ville;

        return $this;
    }

    /**
     * @return Collection<int, Stade>
     */
    public function getStades(): Collection
    {
        return $this->stades;
    }

    public function addStade(Stade $stade): self
    {
        if (!$this->stades->contains($stade)) {
            $this->stades->add($stade);
            $stade->setVille($this);
        }

        return $this;
    }

    public function removeStade(Stade $stade): self
    {
        if ($this->stades->removeElement($stade)) {
            // set the owning side to null (unless already changed)
            if ($stade->getVille() === $this) {
                $stade->setVille(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->nom_ville ; 
    }
}
