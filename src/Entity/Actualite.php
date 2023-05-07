<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActualiteRepository::class)]
class Actualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre_actualite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $texte_actualite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo_actualite = null;

    #[ORM\OneToMany(mappedBy: 'actualite', targetEntity: Post::class, orphanRemoval: true)]
    private Collection $post;

    public function __construct()
    {
        $this->post = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreActualite(): ?string
    {
        return $this->titre_actualite;
    }

    public function setTitreActualite(string $titre_actualite): self
    {
        $this->titre_actualite = $titre_actualite;

        return $this;
    }

    public function getTexteActualite(): ?string
    {
        return $this->texte_actualite;
    }

    public function setTexteActualite(string $texte_actualite): self
    {
        $this->texte_actualite = $texte_actualite;

        return $this;
    }

    public function getPhotoActualite(): ?string
    {
        return $this->photo_actualite;
    }

    public function setPhotoActualite(?string $photo_actualite): self
    {
        $this->photo_actualite = $photo_actualite;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    public function addPost(Post $post): self
    {
        if (!$this->post->contains($post)) {
            $this->post->add($post);
            $post->setActualite($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->post->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getActualite() === $this) {
                $post->setActualite(null);
            }
        }

        return $this;
    }
}
