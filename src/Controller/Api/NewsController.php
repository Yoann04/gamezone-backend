<?php

namespace App\Controller\Api;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/news')]
class NewsController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(NewsRepository $repo): JsonResponse
    {
        $items = $repo->findBy([], ['createdAt' => 'DESC']);

        $data = array_map(static function ($n) {
            return [
                'id' => $n->getId(),
                'title' => $n->getTitle(),
                'slug' => $n->getSlug(),
                'excerpt' => $n->getExcerpt(),
                'coverUrl' => $n->getCoverUrl(),
                'author' => $n->getAuthor(),
                'tags' => $n->getTags(),
                'createdAt' => $n->getCreatedAt()?->format('Y-m-d'),
                'game' => $n->getGame()
                    ? [
                        'title' => $n->getGame()->getTitle(),
                        'slug' => $n->getGame()->getSlug(),
                      ]
                    : null,
            ];
        }, $items);

        return $this->json($data);
    }

    #[Route('/{slug}', methods: ['GET'])]
    public function show(string $slug, NewsRepository $repo): JsonResponse
    {
        $n = $repo->findOneBy(['slug' => $slug]);

        if (!$n) {
            return $this->json(['message' => 'News introuvable'], 404);
        }

        return $this->json([
            'id' => $n->getId(),
            'title' => $n->getTitle(),
            'slug' => $n->getSlug(),
            'content' => $n->getContent(),
            'coverUrl' => $n->getCoverUrl(),
            'author' => $n->getAuthor(),
            'tags' => $n->getTags(),
            'createdAt' => $n->getCreatedAt()?->format('Y-m-d'),
            'game' => $n->getGame()
                ? [
                    'title' => $n->getGame()->getTitle(),
                    'slug' => $n->getGame()->getSlug(),
                  ]
                : null,
        ]);
    }
}