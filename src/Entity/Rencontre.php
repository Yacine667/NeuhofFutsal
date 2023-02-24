<?php

namespace App\Entity;

use App\Repository\RencontreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RencontreRepository::class)]
class Rencontre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_rencontre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $score_rencontre = null;

    #[ORM\ManyToOne(inversedBy: 'rencontres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stade $stade = null;

    #[ORM\OneToMany(mappedBy: 'rencontre', targetEntity: But::class)]
    private Collection $buts;

    #[ORM\OneToMany(mappedBy: 'rencontre', targetEntity: Avertir::class)]
    private Collection $avertirs;

    #[ORM\OneToMany(mappedBy: 'rencontre', targetEntity: Titulaire::class)]
    private Collection $titulaires;

    #[ORM\OneToMany(mappedBy: 'rencontre', targetEntity: Remplacant::class)]
    private Collection $remplacants;

    #[ORM\OneToMany(mappedBy: 'rencontre', targetEntity: RemplaceEntrant::class)]
    private Collection $remplaceEntrants;

    #[ORM\OneToMany(mappedBy: 'rencontre', targetEntity: RemplaceSortant::class)]
    private Collection $remplaceSortants;

    public function __construct()
    {
        $this->buts = new ArrayCollection();
        $this->avertirs = new ArrayCollection();
        $this->titulaires = new ArrayCollection();
        $this->remplacants = new ArrayCollection();
        $this->remplaceEntrants = new ArrayCollection();
        $this->remplaceSortants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRencontre(): ?\DateTimeInterface
    {
        return $this->date_rencontre;
    }

    public function setDateRencontre(\DateTimeInterface $date_rencontre): self
    {
        $this->date_rencontre = $date_rencontre;

        return $this;
    }

    public function getScoreRencontre(): ?string
    {
        return $this->score_rencontre;
    }

    public function setScoreRencontre(?string $score_rencontre): self
    {
        $this->score_rencontre = $score_rencontre;

        return $this;
    }

    public function getStade(): ?Stade
    {
        return $this->stade;
    }

    public function setStade(?Stade $stade): self
    {
        $this->stade = $stade;

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
            $but->setRencontre($this);
        }

        return $this;
    }

    public function removeBut(But $but): self
    {
        if ($this->buts->removeElement($but)) {
            // set the owning side to null (unless already changed)
            if ($but->getRencontre() === $this) {
                $but->setRencontre(null);
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
            $avertir->setRencontre($this);
        }

        return $this;
    }

    public function removeAvertir(Avertir $avertir): self
    {
        if ($this->avertirs->removeElement($avertir)) {
            // set the owning side to null (unless already changed)
            if ($avertir->getRencontre() === $this) {
                $avertir->setRencontre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Titulaire>
     */
    public function getTitulaires(): Collection
    {
        return $this->titulaires;
    }

    public function addTitulaire(Titulaire $titulaire): self
    {
        if (!$this->titulaires->contains($titulaire)) {
            $this->titulaires->add($titulaire);
            $titulaire->setRencontre($this);
        }

        return $this;
    }

    public function removeTitulaire(Titulaire $titulaire): self
    {
        if ($this->titulaires->removeElement($titulaire)) {
            // set the owning side to null (unless already changed)
            if ($titulaire->getRencontre() === $this) {
                $titulaire->setRencontre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Remplacant>
     */
    public function getRemplacants(): Collection
    {
        return $this->remplacants;
    }

    public function addRemplacant(Remplacant $remplacant): self
    {
        if (!$this->remplacants->contains($remplacant)) {
            $this->remplacants->add($remplacant);
            $remplacant->setRencontre($this);
        }

        return $this;
    }

    public function removeRemplacant(Remplacant $remplacant): self
    {
        if ($this->remplacants->removeElement($remplacant)) {
            // set the owning side to null (unless already changed)
            if ($remplacant->getRencontre() === $this) {
                $remplacant->setRencontre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RemplaceEntrant>
     */
    public function getRemplaceEntrants(): Collection
    {
        return $this->remplaceEntrants;
    }

    public function addRemplaceEntrant(RemplaceEntrant $remplaceEntrant): self
    {
        if (!$this->remplaceEntrants->contains($remplaceEntrant)) {
            $this->remplaceEntrants->add($remplaceEntrant);
            $remplaceEntrant->setRencontre($this);
        }

        return $this;
    }

    public function removeRemplaceEntrant(RemplaceEntrant $remplaceEntrant): self
    {
        if ($this->remplaceEntrants->removeElement($remplaceEntrant)) {
            // set the owning side to null (unless already changed)
            if ($remplaceEntrant->getRencontre() === $this) {
                $remplaceEntrant->setRencontre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RemplaceSortant>
     */
    public function getRemplaceSortants(): Collection
    {
        return $this->remplaceSortants;
    }

    public function addRemplaceSortant(RemplaceSortant $remplaceSortant): self
    {
        if (!$this->remplaceSortants->contains($remplaceSortant)) {
            $this->remplaceSortants->add($remplaceSortant);
            $remplaceSortant->setRencontre($this);
        }

        return $this;
    }

    public function removeRemplaceSortant(RemplaceSortant $remplaceSortant): self
    {
        if ($this->remplaceSortants->removeElement($remplaceSortant)) {
            // set the owning side to null (unless already changed)
            if ($remplaceSortant->getRencontre() === $this) {
                $remplaceSortant->setRencontre(null);
            }
        }

        return $this;
    }

}
