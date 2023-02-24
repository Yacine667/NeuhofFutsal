<?php

namespace App\Entity;

use App\Repository\AvertirRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvertirRepository::class)]
class Avertir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $motif_avertissement = null;

    #[ORM\Column]
    private ?int $minute_avertissement = null;

    #[ORM\ManyToOne(inversedBy: 'avertirs')]
    private ?Rencontre $rencontre = null;

    #[ORM\ManyToOne(inversedBy: 'avertirs')]
    private ?Joueur $joueur = null;

    #[ORM\ManyToOne(inversedBy: 'avertirs')]
    private ?Avertissement $avertissement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotifAvertissement(): ?string
    {
        return $this->motif_avertissement;
    }

    public function setMotifAvertissement(string $motif_avertissement): self
    {
        $this->motif_avertissement = $motif_avertissement;

        return $this;
    }

    public function getMinuteAvertissement(): ?int
    {
        return $this->minute_avertissement;
    }

    public function setMinuteAvertissement(int $minute_avertissement): self
    {
        $this->minute_avertissement = $minute_avertissement;

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

    public function getAvertissement(): ?Avertissement
    {
        return $this->avertissement;
    }

    public function setAvertissement(?Avertissement $avertissement): self
    {
        $this->avertissement = $avertissement;

        return $this;
    }
}
