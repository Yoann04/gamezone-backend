<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(length: 180)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $longDescription = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $releaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverUrl = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    // Tableau de plateformes (PC, PS5, Xbox...)
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $platforms = [];

    // Note (ex: 4.6)
    #[ORM\Column(nullable: true)]
    private ?float $rating = null;

    // Nombre d'avis (ex: 12840)
    #[ORM\Column(nullable: true)]
    private ?int $ratingCount = null;

    // 3 avis (tableau d'objets)
    // ex: [ ['author'=>'Alex','note'=>5,'content'=>'...'], ... ]
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $reviews = [];

    // Points forts / faibles
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $pros = [];

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $cons = [];

    // Infos jeu
    #[ORM\Column(length: 150, nullable: true)]
    private ?string $publisher = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $developer = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $modes = [];

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Category $category = null;

    /**
     * @var Collection<int, News>
     */
    #[ORM\OneToMany(targetEntity: News::class, mappedBy: 'game')]
    private Collection $news;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->news = new ArrayCollection();
    }

    // =========================
    // GETTERS / SETTERS
    // =========================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(?string $longDescription): static
    {
        $this->longDescription = $longDescription;
        return $this;
    }

    public function getReleaseDate(): ?\DateTimeImmutable
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeImmutable $releaseDate): static
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    public function getCoverUrl(): ?string
    {
        return $this->coverUrl;
    }

    public function setCoverUrl(?string $coverUrl): static
    {
        $this->coverUrl = $coverUrl;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getPlatforms(): array
    {
        return $this->platforms ?? [];
    }

    public function setPlatforms(?array $platforms): static
    {
        $this->platforms = $platforms ?? [];
        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): static
    {
        $this->rating = $rating;
        return $this;
    }

    public function getRatingCount(): ?int
    {
        return $this->ratingCount;
    }

    public function setRatingCount(?int $ratingCount): static
    {
        $this->ratingCount = $ratingCount;
        return $this;
    }

    public function getReviews(): array
    {
        return $this->reviews ?? [];
    }

    public function setReviews(?array $reviews): static
    {
        $this->reviews = $reviews ?? [];
        return $this;
    }

    public function getPros(): array
    {
        return $this->pros ?? [];
    }

    public function setPros(?array $pros): static
    {
        $this->pros = $pros ?? [];
        return $this;
    }

    public function getCons(): array
    {
        return $this->cons ?? [];
    }

    public function setCons(?array $cons): static
    {
        $this->cons = $cons ?? [];
        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): static
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function getDeveloper(): ?string
    {
        return $this->developer;
    }

    public function setDeveloper(?string $developer): static
    {
        $this->developer = $developer;
        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): static
    {
        $this->genre = $genre;
        return $this;
    }

    public function getModes(): array
    {
        return $this->modes ?? [];
    }

    public function setModes(?array $modes): static
    {
        $this->modes = $modes ?? [];
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Collection<int, News>
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): static
    {
        if (!$this->news->contains($news)) {
            $this->news->add($news);
            $news->setGame($this);
        }

        return $this;
    }

    public function removeNews(News $news): static
    {
        if ($this->news->removeElement($news)) {
            if ($news->getGame() === $this) {
                $news->setGame(null);
            }
        }

        return $this;
    }
}