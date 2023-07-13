<?php

namespace App\Entity;

use App\Repository\OpposeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpposeRepository::class)]
class Oppose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $score_match = null;

    #[ORM\ManyToOne(inversedBy: 'opposes')]
    private ?Rencontre $rencontre = null;

    #[ORM\ManyToOne(inversedBy: 'opposes')]
    private ?Equipe $equipe_1 = null;

    #[ORM\ManyToOne]
    private ?Equipe $equipe_2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreMatch(): ?string
    {
        return $this->score_match;
    }

    public function setScoreMatch(?string $score_match): self
    {
        $this->score_match = $score_match;

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

    public function getEquipe1(): ?Equipe
    {
        return $this->equipe_1;
    }

    public function setEquipe1(?Equipe $equipe_1): self
    {
        $this->equipe_1 = $equipe_1;

        return $this;
    }

    public function getEquipe2(): ?Equipe
    {
        return $this->equipe_2;
    }

    public function setEquipe2(?Equipe $equipe_2): self
    {
        $this->equipe_2 = $equipe_2;

        return $this;
    }

    public function __toString()
    {
       return $this->equipe_1 . " VS " . $this->equipe_2; 
    }

}
