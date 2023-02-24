<?php

namespace App\Entity;

use App\Repository\AvertissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvertissementRepository::class)]
class Avertissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur_avertissement = null;

    #[ORM\OneToMany(mappedBy: 'avertissement', targetEntity: Avertir::class)]
    private Collection $avertirs;

    public function __construct()
    {
        $this->avertirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleurAvertissement(): ?string
    {
        return $this->couleur_avertissement;
    }

    public function setCouleurAvertissement(string $couleur_avertissement): self
    {
        $this->couleur_avertissement = $couleur_avertissement;

        return $this;
    }

    /**
     * @return Collection<int, Avertir>
     */
    public function getAvertirs(): Collection
    {
        return $this->avertirs;
    }

    public function addAvertir(Avertir $avertir): self
    {
        if (!$this->avertirs->contains($avertir)) {
            $this->avertirs->add($avertir);
            $avertir->setAvertissement($this);
        }

        return $this;
    }

    public function removeAvertir(Avertir $avertir): self
    {
        if ($this->avertirs->removeElement($avertir)) {
            // set the owning side to null (unless already changed)
            if ($avertir->getAvertissement() === $this) {
                $avertir->setAvertissement(null);
            }
        }

        return $this;
    }
}
