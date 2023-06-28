<?php

namespace App\Entity;

use App\Repository\EntraineurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntraineurRepository::class)]
class Entraineur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_entraineur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_entraineur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo_entraineur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video_entraineur = null;

    #[ORM\OneToMany(mappedBy: 'entraineur', targetEntity: Equipe::class)]
    #[ORM\JoinColumn(nullable: true)]
    private Collection $equipes;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quote = null;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntraineur(): ?string
    {
        return $this->nom_entraineur;
    }

    public function setNomEntraineur(string $nom_entraineur): self
    {
        $this->nom_entraineur = $nom_entraineur;

        return $this;
    }

    public function getPrenomEntraineur(): ?string
    {
        return $this->prenom_entraineur;
    }

    public function setPrenomEntraineur(string $prenom_entraineur): self
    {
        $this->prenom_entraineur = $prenom_entraineur;

        return $this;
    }

    public function getPhotoEntraineur(): ?string
    {
        return $this->photo_entraineur;
    }

    public function setPhotoEntraineur(?string $photo_entraineur): self
    {
        $this->photo_entraineur = $photo_entraineur;

        return $this;
    }

    public function getVideoEntraineur(): ?string
    {
        return $this->video_entraineur;
    }

    public function setVideoEntraineur(?string $video_entraineur): self
    {
        $this->video_entraineur = $video_entraineur;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
            $equipe->setEntraineur($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getEntraineur() === $this) {
                $equipe->setEntraineur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->nom_entraineur ." " . $this-> prenom_entraineur ; 
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(?string $quote): self
    {
        $this->quote = $quote;

        return $this;
    }
}
