<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_joueur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_joueur = null;

    #[ORM\Column]
    private ?int $numero_joueur = null;

    #[ORM\Column(length: 255)]
    private ?string $poste_joueur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_naissance_joueur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo_joueur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video_joueur = null;

    #[ORM\Column(nullable: true)]
    private ?int $note_attaque = null;

    #[ORM\Column(nullable: true)]
    private ?int $note_defense = null;

    #[ORM\Column(nullable: true)]
    private ?int $note_passe = null;

    #[ORM\Column(nullable: true)]
    private ?int $note_drible = null;

    #[ORM\Column(nullable: true)]
    private ?int $note_gardien = null;

    #[ORM\Column(nullable: true)]
    private ?int $note_tir = null;

    #[ORM\OneToMany(mappedBy: 'joueur', targetEntity: But::class)]
    private Collection $buts;

    #[ORM\OneToMany(mappedBy: 'joueur', targetEntity: Avertir::class)]
    private Collection $avertirs;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    public function __construct()
    {
        $this->buts = new ArrayCollection();
        $this->avertirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomJoueur(): ?string
    {
        return $this->nom_joueur;
    }

    public function setNomJoueur(string $nom_joueur): self
    {
        $this->nom_joueur = $nom_joueur;

        return $this;
    }

    public function getPrenomJoueur(): ?string
    {
        return $this->prenom_joueur;
    }

    public function setPrenomJoueur(string $prenom_joueur): self
    {
        $this->prenom_joueur = $prenom_joueur;

        return $this;
    }

    public function getNumeroJoueur(): ?int
    {
        return $this->numero_joueur;
    }

    public function setNumeroJoueur(int $numero_joueur): self
    {
        $this->numero_joueur = $numero_joueur;

        return $this;
    }

    public function getPosteJoueur(): ?string
    {
        return $this->poste_joueur;
    }

    public function setPosteJoueur(string $poste_joueur): self
    {
        $this->poste_joueur = $poste_joueur;

        return $this;
    }

    public function getDateNaissanceJoueur(): ?\DateTimeInterface
    {
        return $this->date_naissance_joueur;
    }

    public function setDateNaissanceJoueur(\DateTimeInterface $date_naissance_joueur): self
    {
        $this->date_naissance_joueur = $date_naissance_joueur;

        return $this;
    }

    public function getPhotoJoueur(): ?string
    {
        return $this->photo_joueur;
    }

    public function setPhotoJoueur(string $photo_joueur): self
    {
        $this->photo_joueur = $photo_joueur;

        return $this;
    }

    public function getVideoJoueur(): ?string
    {
        return $this->video_joueur;
    }

    public function setVideoJoueur(?string $video_joueur): self
    {
        $this->video_joueur = $video_joueur;

        return $this;
    }

    public function getNoteAttaque(): ?int
    {
        return $this->note_attaque;
    }

    public function setNoteAttaque(?int $note_attaque): self
    {
        $this->note_attaque = $note_attaque;

        return $this;
    }

    public function getNoteDefense(): ?int
    {
        return $this->note_defense;
    }

    public function setNoteDefense(?int $note_defense): self
    {
        $this->note_defense = $note_defense;

        return $this;
    }

    public function getNotePasse(): ?int
    {
        return $this->note_passe;
    }

    public function setNotePasse(?int $note_passe): self
    {
        $this->note_passe = $note_passe;

        return $this;
    }

    public function getNoteDrible(): ?int
    {
        return $this->note_drible;
    }

    public function setNoteDrible(?int $note_drible): self
    {
        $this->note_drible = $note_drible;

        return $this;
    }

    public function getNoteGardien(): ?int
    {
        return $this->note_gardien;
    }

    public function setNoteGardien(?int $note_gardien): self
    {
        $this->note_gardien = $note_gardien;

        return $this;
    }

    public function getNoteTir(): ?int
    {
        return $this->note_tir;
    }

    public function setNoteTir(?int $note_tir): self
    {
        $this->note_tir = $note_tir;

        return $this;
    }

    /**
     * @return Collection<int, But>
     */
    public function getButs(): Collection
    {
        return $this->buts;
    }

    public function addBut(But $but): self
    {
        if (!$this->buts->contains($but)) {
            $this->buts->add($but);
            $but->setJoueur($this);
        }

        return $this;
    }

    public function removeBut(But $but): self
    {
        if ($this->buts->removeElement($but)) {
            // set the owning side to null (unless already changed)
            if ($but->getJoueur() === $this) {
                $but->setJoueur(null);
            }
        }

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
            $avertir->setJoueur($this);
        }

        return $this;
    }

    public function removeAvertir(Avertir $avertir): self
    {
        if ($this->avertirs->removeElement($avertir)) {
            // set the owning side to null (unless already changed)
            if ($avertir->getJoueur() === $this) {
                $avertir->setJoueur(null);
            }
        }

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function __toString()
    {
       return $this->nom_joueur ; 
    }

}
