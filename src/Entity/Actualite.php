<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ActualiteRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ActualiteRepository::class)]

#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'actualite:item']),
        new GetCollection(normalizationContext: ['groups' => 'actualite:list'])
    ],
    paginationEnabled: false,
)]

class Actualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['actualite:list', 'actualite:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['actualite:list', 'actualite:item'])]
    private ?string $titre_actualite = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['actualite:list', 'actualite:item'])]
    private ?string $texte_actualite = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['actualite:list', 'actualite:item'])]
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
