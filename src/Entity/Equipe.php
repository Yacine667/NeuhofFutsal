<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_equipe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo_equipe = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entraineur $entraineur = null;

    #[ORM\OneToMany(mappedBy: 'equipe_1', targetEntity: Oppose::class)]
    private Collection $opposes;

    #[ORM\OneToMany(mappedBy: 'equipe', targetEntity: Joueur::class, orphanRemoval: true)]
    private Collection $joueurs;

    public function __construct()
    {
        $this->opposes = new ArrayCollection();
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nom_equipe;
    }

    public function setNomEquipe(string $nom_equipe): self
    {
        $this->nom_equipe = $nom_equipe;

        return $this;
    }

    public function getLogoEquipe(): ?string
    {
        return $this->logo_equipe;
    }

    public function setLogoEquipe(?string $logo_equipe): self
    {
        $this->logo_equipe = $logo_equipe;

        return $this;
    }

    public function getEntraineur(): ?Entraineur
    {
        return $this->entraineur;
    }

    public function setEntraineur(?Entraineur $entraineur): self
    {
        $this->entraineur = $entraineur;

        return $this;
    }

    /**
     * @return Collection<int, Oppose>
     */
    public function getOpposes(): Collection
    {
        return $this->opposes;
    }

    public function addOppose(Oppose $oppose): self
    {
        if (!$this->opposes->contains($oppose)) {
            $this->opposes->add($oppose);
            $oppose->setEquipe1($this);
        }

        return $this;
    }

    public function removeOppose(Oppose $oppose): self
    {
        if ($this->opposes->removeElement($oppose)) {
            // set the owning side to null (unless already changed)
            if ($oppose->getEquipe1() === $this) {
                $oppose->setEquipe1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Joueur>
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
            $joueur->setEquipe($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        if ($this->joueurs->removeElement($joueur)) {
            // set the owning side to null (unless already changed)
            if ($joueur->getEquipe() === $this) {
                $joueur->setEquipe(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->nom_equipe ; 
    }
}
