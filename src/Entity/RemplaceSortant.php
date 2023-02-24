<?php

namespace App\Entity;

use App\Repository\RemplaceSortantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemplaceSortantRepository::class)]
class RemplaceSortant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $motif_remplacement = null;

    #[ORM\Column]
    private ?int $minute_remplacement = null;

    #[ORM\ManyToOne(inversedBy: 'remplaceSortants')]
    private ?Rencontre $rencontre = null;

    #[ORM\ManyToOne]
    private ?Joueur $joueur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotifRemplacement(): ?string
    {
        return $this->motif_remplacement;
    }

    public function setMotifRemplacement(string $motif_remplacement): self
    {
        $this->motif_remplacement = $motif_remplacement;

        return $this;
    }

    public function getMinuteRemplacement(): ?int
    {
        return $this->minute_remplacement;
    }

    public function setMinuteRemplacement(int $minute_remplacement): self
    {
        $this->minute_remplacement = $minute_remplacement;

        return $this;
    }

    public function getRencontre(): ?Rencontre
    {
        return $this->rencontre;
    }

    public function setRencontre(?Rencontre $rencontre): self
    {
        $this->rencontre = $rencontre;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }
}
