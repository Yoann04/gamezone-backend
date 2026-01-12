<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(length: 180)]
    private ?string $slug = null;

    // résumé court
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $excerpt = null;

    // image
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverUrl = null;

    // auteur
    #[ORM\Column(length: 120, nullable: true)]
    private ?string $author = null;

    // tags (tableau)
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $tags = [];

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'news')]
    private ?Game $game = null;

    public function getId(): ?int { return $this->id; }

    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }

    public function getSlug(): ?string { return $this->slug; }
    public function setSlug(string $slug): static { $this->slug = $slug; return $this; }

    public function getExcerpt(): ?string { return $this->excerpt; }
    public function setExcerpt(?string $excerpt): static { $this->excerpt = $excerpt; return $this; }

    public function getCoverUrl(): ?string { return $this->coverUrl; }
    public function setCoverUrl(?string $coverUrl): static { $this->coverUrl = $coverUrl; return $this; }

    public function getAuthor(): ?string { return $this->author; }
    public function setAuthor(?string $author): static { $this->author = $author; return $this; }

    public function getTags(): array { return $this->tags ?? []; }
    public function setTags(?array $tags): static { $this->tags = $tags ?? []; return $this; }

    public function getContent(): ?string { return $this->content; }
    public function setContent(string $content): static { $this->content = $content; return $this; }

    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
    public function setCreatedAt(\DateTimeImmutable $createdAt): static { $this->createdAt = $createdAt; return $this; }

    public function getGame(): ?Game { return $this->game; }
    public function setGame(?Game $game): static { $this->game = $game; return $this; }
}