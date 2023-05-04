<?php

namespace App\Entity;

use App\Repository\StadeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StadeRepository::class)]
class Stade
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_stade = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_stade = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo_stade = null;

    #[ORM\ManyToOne(inversedBy: 'stades')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ville $ville = null;

    #[ORM\OneToMany(mappedBy: 'stade', targetEntity: Rencontre::class)]
    private Collection $rencontres;

    public function __construct()
    {
        $this->rencontres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStade(): ?string
    {
        return $this->nom_stade;
    }

    public function setNomStade(string $nom_stade): self
    {
        $this->nom_stade = $nom_stade;

        return $this;
    }

    public function getAdresseStade(): ?string
    {
        return $this->adresse_stade;
    }

    public function setAdresseStade(string $adresse_stade): self
    {
        $this->adresse_stade = $adresse_stade;

        return $this;
    }

    public function getPhotoStade(): ?string
    {
        return $this->photo_stade;
    }

    public function setPhotoStade(?string $photo_stade): self
    {
        $this->photo_stade = $photo_stade;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, Rencontre>
     */
    public function getRencontres(): Collection
    {
        return $this->rencontres;
    }

    public function addRencontre(Rencontre $rencontre): self
    {
        if (!$this->rencontres->contains($rencontre)) {
            $this->rencontres->add($rencontre);
            $rencontre->setStade($this);
        }

        return $this;
    }

    public function removeRencontre(Rencontre $rencontre): self
    {
        if ($this->rencontres->removeElement($rencontre)) {
            // set the owning side to null (unless already changed)
            if ($rencontre->getStade() === $this) {
                $rencontre->setStade(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->nom_stade ; 
    }
}
