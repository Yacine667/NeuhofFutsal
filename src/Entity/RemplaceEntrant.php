<?php

namespace App\Entity;

use App\Repository\RemplaceEntrantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemplaceEntrantRepository::class)]
class RemplaceEntrant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $minute_Remplacement = null;

    #[ORM\ManyToOne(inversedBy: 'remplaceEntrants')]
    private ?Rencontre $rencontre = null;

    #[ORM\ManyToOne]
    private ?Joueur $Joueur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinuteRemplacement(): ?int
    {
        return $this->minute_Remplacement;
    }

    public function setMinuteRemplacement(int $minute_Remplacement): self
    {
        $this->minute_Remplacement = $minute_Remplacement;

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
        return $this->Joueur;
    }

    public function setJoueur(?Joueur $Joueur): self
    {
        $this->Joueur = $Joueur;

        return $this;
    }
}
