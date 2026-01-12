<?php

namespace App\Controller\Api;

use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/games')]
class GameController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(GameRepository $gameRepository): JsonResponse
    {
        $games = $gameRepository->findAll();

        $data = array_map(static function ($game) {
            return [
                'id' => $game->getId(),
                'title' => $game->getTitle(),
                'slug' => $game->getSlug(),
                'description' => $game->getDescription(),
                'coverUrl' => $game->getCoverUrl(),
                'releaseDate' => $game->getReleaseDate()?->format('Y-m-d'),
                'category' => $game->getCategory()
                    ? [
                        'name' => $game->getCategory()->getName(),
                        'slug' => $game->getCategory()->getSlug(),
                    ]
                    : null,

                // NEW (liste seulement, utile pour cards/listes)
                'rating' => method_exists($game, 'getRating') ? $game->getRating() : null,
                'ratingCount' => method_exists($game, 'getRatingCount') ? $game->getRatingCount() : null,
                'platforms' => method_exists($game, 'getPlatforms') ? $game->getPlatforms() : [],
                'genre' => method_exists($game, 'getGenre') ? $game->getGenre() : null,
            ];
        }, $games);

        return $this->json($data);
    }

    #[Route('/{slug}', methods: ['GET'])]
    public function show(string $slug, GameRepository $gameRepository): JsonResponse
    {
        $game = $gameRepository->findOneBy(['slug' => $slug]);

        if (!$game) {
            return $this->json(['message' => 'Jeu introuvable'], 404);
        }

        return $this->json([
            'id' => $game->getId(),
            'title' => $game->getTitle(),
            'slug' => $game->getSlug(),
            'description' => $game->getDescription(),
            'coverUrl' => $game->getCoverUrl(),
            'releaseDate' => $game->getReleaseDate()?->format('Y-m-d'),
            'category' => $game->getCategory()
                ? [
                    'name' => $game->getCategory()->getName(),
                    'slug' => $game->getCategory()->getSlug(),
                ]
                : null,

            // NEW (détails complets page jeu)
            'longDescription' => $game->getLongDescription(),
            'platforms' => $game->getPlatforms(),
            'genre' => $game->getGenre(),
            'modes' => $game->getModes(),
            'publisher' => $game->getPublisher(),
            'developer' => $game->getDeveloper(),
            'rating' => $game->getRating(),
            'ratingCount' => $game->getRatingCount(),
            'pros' => $game->getPros(),
            'cons' => $game->getCons(),
            'reviews' => $game->getReviews(),
        ]);
    }
}