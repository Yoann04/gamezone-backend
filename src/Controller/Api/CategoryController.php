<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/categories')]
class CategoryController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): JsonResponse
    {
        $categories = $categoryRepository->findAll();

        $data = array_map(fn($c) => [
            'id' => $c->getId(),
            'name' => $c->getName(),
            'slug' => $c->getSlug(),
        ], $categories);

        return $this->json($data);
    }

    #[Route('/{slug}/games', methods: ['GET'])]
    public function games(string $slug, CategoryRepository $categoryRepository): JsonResponse
    {
        $category = $categoryRepository->findOneBy(['slug' => $slug]);

        if (!$category) {
            return $this->json(['message' => 'Category not found'], 404);
        }

        $games = [];
        foreach ($category->getGames() as $g) {
            $games[] = [
                'id' => $g->getId(),
                'title' => $g->getTitle(),
                'slug' => $g->getSlug(),
                'description' => $g->getDescription(),
                'coverUrl' => $g->getCoverUrl(),
                'releaseDate' => $g->getReleaseDate()?->format('Y-m-d'),
                'category' => [
                    'id' => $category->getId(),
                    'name' => $category->getName(),
                    'slug' => $category->getSlug(),
                ],
            ];
        }

        return $this->json([
            'category' => [
                'id' => $category->getId(),
                'name' => $category->getName(),
                'slug' => $category->getSlug(),
            ],
            'games' => $games,
        ]);
    }
}