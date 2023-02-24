<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $texte_post = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextePost(): ?string
    {
        return $this->texte_post;
    }

    public function setTextePost(string $texte_post): self
    {
        $this->texte_post = $texte_post;

        return $this;
    }
}
