<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Game;
use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // =========================
        // CATEGORIES
        // =========================
        $categories = [];
        foreach ([
            ['Course', 'course'],
            ['FPS / Battle Royale', 'fps-battle-royale'],
            ['MMORPG', 'mmorpg'],
            ['RPG', 'rpg'],
            ['Action / Aventure', 'action-aventure'],
            ['Open World', 'open-world'],
        ] as [$name, $slug]) {
            $c = new Category();
            $c->setName($name);
            $c->setSlug($slug);
            $manager->persist($c);
            $categories[$slug] = $c;
        }

        // =========================
        // GAMES
        // =========================
        $games = [];

        $gamesBase = [
            ['Forza Horizon 5', 'forza-horizon-5', 'course', '2021-11-05', '/assets/games/Forza-Horizon-5.jpg'],
            ['F1 2025', 'f1-2025', 'course', '2025-05-30', '/assets/games/F1-25.jpg'],
            ['Fortnite', 'fortnite', 'fps-battle-royale', '2017-09-26', '/assets/games/Fortnite.jpg'],
            ['Call of Duty: Black Ops 7', 'call-of-duty-black-ops-7', 'fps-battle-royale', '2025-11-14', '/assets/games/COD-BO-7.jpg'],
            ['World of Warcraft', 'world-of-warcraft', 'mmorpg', '2004-11-23', '/assets/games/WOW.jpg'],
            ['New World', 'new-world', 'mmorpg', '2021-09-28', '/assets/games/New-World.jpg'],
            ['The Witcher 3', 'the-witcher-3', 'rpg', '2015-05-19', '/assets/games/The-Witcher-3.jpg'],
            ['Elden Ring', 'elden-ring', 'rpg', '2022-02-25', '/assets/games/EldenRing.jpg'],
            ['GTA V', 'gta-v', 'open-world', '2013-09-17', '/assets/games/GTA5.jpg'],
            ['Red Dead Redemption 2', 'red-dead-redemption-2', 'open-world', '2018-10-26', '/assets/games/Red-Dead-Redemption-2.jpg'],
            ['God of War Ragnarök', 'god-of-war-ragnarok', 'action-aventure', '2022-11-09', '/assets/games/God-Of-War-Ragnarok.jpg'],
            ['Horizon Forbidden West', 'horizon-forbidden-west', 'action-aventure', '2022-02-18', '/assets/games/Horizon-Forbidden-West.jpg'],
        ];

        // =========================
        // Game details - COMPLET (12 jeux)
        // =========================
        $details = [
            'forza-horizon-5' => [
                'platforms' => ['PC', 'Xbox Series', 'Xbox One'],
                'genre' => 'Course / Open World',
                'modes' => ['Solo', 'Multijoueur'],
                'publisher' => 'Xbox Game Studios',
                'developer' => 'Playground Games',
                'rating' => 4.7,
                'ratingCount' => 9800,
                'pros' => ['Map immense', 'Conduite fun', 'Visuels superbes'],
                'cons' => ['Progression parfois répétitive'],
                'longDescription' => "Forza Horizon 5 vous emmène au Mexique dans un monde ouvert spectaculaire.\nCourses, défis, exploration et événements communautaires : un jeu taillé pour le fun et la liberté.",
                'reviews' => [
                    ['author' => 'Léo', 'note' => 5, 'content' => 'Le meilleur Horizon, la map est incroyable.'],
                    ['author' => 'Sarah', 'note' => 4, 'content' => 'Très beau et fun, un peu répétitif à la longue.'],
                    ['author' => 'Tom', 'note' => 5, 'content' => 'Parfait entre potes en multi !'],
                ],
            ],

            'f1-2025' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series'],
                'genre' => 'Course / Simulation',
                'modes' => ['Solo', 'Multijoueur'],
                'publisher' => 'EA Sports',
                'developer' => 'Codemasters',
                'rating' => 4.3,
                'ratingCount' => 6400,
                'pros' => ['Sensations de pilotage', 'Mode carrière', 'Online compétitif'],
                'cons' => ['Nécessite du réglage', 'Toujours exigeant au pad'],
                'longDescription' => "Le jeu officiel de Formule 1 revient avec un gameplay affiné, une IA améliorée et une carrière plus riche.\nRéglages, stratégie et précision : ici, chaque détail compte.",
                'reviews' => [
                    ['author' => 'Chris', 'note' => 4, 'content' => 'Très bon feeling, surtout au volant.'],
                    ['author' => 'Inès', 'note' => 4, 'content' => 'Carrière sympa, online solide.'],
                    ['author' => 'Romain', 'note' => 5, 'content' => 'La meilleure version depuis longtemps.'],
                ],
            ],

            'fortnite' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series', 'Switch', 'Mobile'],
                'genre' => 'Battle Royale',
                'modes' => ['Solo', 'Coop', 'Multijoueur'],
                'publisher' => 'Epic Games',
                'developer' => 'Epic Games',
                'rating' => 4.5,
                'ratingCount' => 22000,
                'pros' => ['Saisons/événements', 'Contenu énorme', 'Fun entre amis'],
                'cons' => ['Meta qui change souvent', 'Matchmaking parfois rude'],
                'longDescription' => "Fortnite évolue en permanence : nouvelles saisons, événements, modes et collaborations.\nUn Battle Royale accessible, mais avec une vraie profondeur si tu veux progresser.",
                'reviews' => [
                    ['author' => 'Nina', 'note' => 5, 'content' => 'Toujours du nouveau, c’est addictif.'],
                    ['author' => 'Yann', 'note' => 4, 'content' => 'Fun, mais il faut suivre la meta.'],
                    ['author' => 'Mehdi', 'note' => 5, 'content' => 'Incroyable avec des potes.'],
                ],
            ],

            'call-of-duty-black-ops-7' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series'],
                'genre' => 'FPS',
                'modes' => ['Solo', 'Multijoueur', 'Coop'],
                'publisher' => 'Activision',
                'developer' => 'Treyarch',
                'rating' => 4.2,
                'ratingCount' => 8700,
                'pros' => ['Gunplay nerveux', 'Modes variés', 'Contenu live'],
                'cons' => ['Patchs fréquents', 'Taille énorme sur disque'],
                'longDescription' => "Black Ops 7 mise sur un FPS explosif, des modes compétitifs et un suivi live régulier.\nProgression, personnalisation et saisons : un vrai jeu-service.",
                'reviews' => [
                    ['author' => 'Lucas', 'note' => 4, 'content' => 'Gunplay très bon, rythme rapide.'],
                    ['author' => 'Aya', 'note' => 4, 'content' => 'Contenu solide, mais lourd à installer.'],
                    ['author' => 'Ben', 'note' => 5, 'content' => 'Multijoueur addictif !'],
                ],
            ],

            'world-of-warcraft' => [
                'platforms' => ['PC'],
                'genre' => 'MMORPG',
                'modes' => ['Multijoueur'],
                'publisher' => 'Blizzard Entertainment',
                'developer' => 'Blizzard Entertainment',
                'rating' => 4.6,
                'ratingCount' => 30500,
                'pros' => ['Univers énorme', 'Raids/donjons', 'Communauté'],
                'cons' => ['Abonnement', 'Peut être chronophage'],
                'longDescription' => "Le MMORPG culte : quêtes, donjons, raids, PvP, métiers… et des extensions régulières.\nIdéal si tu aimes progresser et jouer en guilde.",
                'reviews' => [
                    ['author' => 'Paul', 'note' => 5, 'content' => 'Toujours la référence en MMO.'],
                    ['author' => 'Emma', 'note' => 4, 'content' => 'Excellent contenu, mais ça prend du temps.'],
                    ['author' => 'Karim', 'note' => 5, 'content' => 'Raids mythiques, ambiance unique.'],
                ],
            ],

            'new-world' => [
                'platforms' => ['PC'],
                'genre' => 'MMORPG',
                'modes' => ['Multijoueur'],
                'publisher' => 'Amazon Games',
                'developer' => 'Amazon Games',
                'rating' => 4.0,
                'ratingCount' => 9200,
                'pros' => ['Combats action', 'Craft', 'Ambiance'],
                'cons' => ['Endgame variable', 'Équilibrages'],
                'longDescription' => "Un MMORPG orienté action avec des combats plus “nerveux”, du craft et de la collecte.\nExploration, guerres de territoires et progression au long cours.",
                'reviews' => [
                    ['author' => 'Nico', 'note' => 4, 'content' => 'Combats vraiment sympa en MMO.'],
                    ['author' => 'Lina', 'note' => 4, 'content' => 'Ambiance top, craft addictif.'],
                    ['author' => 'Hugo', 'note' => 3, 'content' => 'L’équilibrage change souvent.'],
                ],
            ],

            'the-witcher-3' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series', 'Switch'],
                'genre' => 'RPG',
                'modes' => ['Solo'],
                'publisher' => 'CD Projekt',
                'developer' => 'CD Projekt Red',
                'rating' => 4.8,
                'ratingCount' => 12840,
                'pros' => ['Histoire incroyable', 'Monde ouvert riche', 'Quêtes mémorables'],
                'cons' => ['Quelques bugs', 'Combats parfois rigides'],
                'longDescription' => "Un RPG en monde ouvert où vous incarnez Geralt de Riv, chasseur de monstres.\nExplores un univers dark fantasy, fais des choix qui influencent l’histoire et vis des quêtes mémorables.",
                'reviews' => [
                    ['author' => 'Alex', 'note' => 5, 'content' => 'Un des meilleurs RPG de tous les temps.'],
                    ['author' => 'Mina', 'note' => 4, 'content' => 'Immersion énorme, juste quelques lenteurs.'],
                    ['author' => 'Sam',  'note' => 5, 'content' => 'Quêtes et DLC exceptionnels.'],
                ],
            ],

            'elden-ring' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series'],
                'genre' => 'Action-RPG',
                'modes' => ['Solo', 'En ligne'],
                'publisher' => 'Bandai Namco',
                'developer' => 'FromSoftware',
                'rating' => 4.6,
                'ratingCount' => 15200,
                'pros' => ['Exploration libre', 'Boss marquants', 'Builds variés'],
                'cons' => ['Difficile', 'Peu guidé'],
                'longDescription' => "Elden Ring mélange l’exigence de FromSoftware et une exploration en monde ouvert.\nUn univers sombre, une liberté totale et des combats exigeants.",
                'reviews' => [
                    ['author' => 'Nico', 'note' => 5, 'content' => 'Chef-d’œuvre, exploration dingue.'],
                    ['author' => 'Julie', 'note' => 4, 'content' => 'Magnifique mais rude au début.'],
                    ['author' => 'Max',  'note' => 5, 'content' => 'Les boss et les builds… énorme.'],
                ],
            ],

            'gta-v' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series'],
                'genre' => 'Open World / Action',
                'modes' => ['Solo', 'Multijoueur'],
                'publisher' => 'Rockstar Games',
                'developer' => 'Rockstar North',
                'rating' => 4.7,
                'ratingCount' => 41000,
                'pros' => ['Ville vivante', 'Contenu énorme', 'GTA Online'],
                'cons' => ['Online très grind', 'Toujours réédité'],
                'longDescription' => "Los Santos, trois personnages, des braquages, et un monde ouvert ultra vivant.\nEn solo comme en ligne, GTA V reste un monument du sandbox urbain.",
                'reviews' => [
                    ['author' => 'Jules', 'note' => 5, 'content' => 'Indémodable.'],
                    ['author' => 'Ana', 'note' => 4, 'content' => 'Online fun mais parfois toxique.'],
                    ['author' => 'Omar', 'note' => 5, 'content' => 'Le monde ouvert est incroyable.'],
                ],
            ],

            'red-dead-redemption-2' => [
                'platforms' => ['PC', 'PS5', 'Xbox Series'],
                'genre' => 'Open World / Aventure',
                'modes' => ['Solo', 'Multijoueur'],
                'publisher' => 'Rockstar Games',
                'developer' => 'Rockstar Studios',
                'rating' => 4.9,
                'ratingCount' => 23500,
                'pros' => ['Immersion folle', 'Écriture', 'Monde vivant'],
                'cons' => ['Rythme lent', 'Contrôles lourds'],
                'longDescription' => "Un western narratif et immersif, porté par une écriture et une mise en scène exceptionnelles.\nUn monde ouvert vivant où chaque détail compte.",
                'reviews' => [
                    ['author' => 'Léo', 'note' => 5, 'content' => 'Une claque.'],
                    ['author' => 'Cam', 'note' => 5, 'content' => 'Le monde le plus vivant que j’ai vu.'],
                    ['author' => 'Fred', 'note' => 4, 'content' => 'Génial mais un peu lent parfois.'],
                ],
            ],

            'god-of-war-ragnarok' => [
                'platforms' => ['PS5', 'PC'],
                'genre' => 'Action / Aventure',
                'modes' => ['Solo'],
                'publisher' => 'Sony Interactive Entertainment',
                'developer' => 'Santa Monica Studio',
                'rating' => 4.8,
                'ratingCount' => 14300,
                'pros' => ['Combat excellent', 'Narration', 'Boss et setpieces'],
                'cons' => ['Assez linéaire', 'Exploration limitée'],
                'longDescription' => "Kratos et Atreus affrontent les conséquences du Ragnarök.\nUn action-aventure spectaculaire, entre combats intenses et narration forte.",
                'reviews' => [
                    ['author' => 'Nina', 'note' => 5, 'content' => 'Incroyable du début à la fin.'],
                    ['author' => 'Yass', 'note' => 5, 'content' => 'Combat et mise en scène au top.'],
                    ['author' => 'Zoé', 'note' => 4, 'content' => 'Très bon, un peu linéaire.'],
                ],
            ],

            'horizon-forbidden-west' => [
                'platforms' => ['PS5', 'PC'],
                'genre' => 'Action / Aventure',
                'modes' => ['Solo'],
                'publisher' => 'Sony Interactive Entertainment',
                'developer' => 'Guerrilla Games',
                'rating' => 4.6,
                'ratingCount' => 11900,
                'pros' => ['Monde superbe', 'Combats contre machines', 'Exploration'],
                'cons' => ['Histoire inégale', 'Craft parfois long'],
                'longDescription' => "Aloy explore l’Ouest interdit pour sauver le monde, avec de nouvelles machines et de nouvelles régions.\nUn open-world très beau, axé action et exploration.",
                'reviews' => [
                    ['author' => 'Clara', 'note' => 5, 'content' => 'Visuellement incroyable.'],
                    ['author' => 'Nils', 'note' => 4, 'content' => 'Super gameplay, histoire parfois inégale.'],
                    ['author' => 'Samy', 'note' => 5, 'content' => 'Les combats contre les machines sont géniaux.'],
                ],
            ],
        ];

        foreach ($gamesBase as [$title, $slug, $catSlug, $releaseDate, $coverUrl]) {
            $g = new Game();
            $g->setTitle($title);
            $g->setSlug($slug);
            $g->setDescription('Description de ' . $title);
            $g->setCategory($categories[$catSlug] ?? null);
            $g->setReleaseDate(new \DateTimeImmutable($releaseDate));
            $g->setCoverUrl($coverUrl);

            $d = $details[$slug] ?? [];
            $g->setPlatforms($d['platforms'] ?? []);
            $g->setGenre($d['genre'] ?? null);
            $g->setModes($d['modes'] ?? []);
            $g->setPublisher($d['publisher'] ?? null);
            $g->setDeveloper($d['developer'] ?? null);
            $g->setRating($d['rating'] ?? null);
            $g->setRatingCount($d['ratingCount'] ?? null);
            $g->setPros($d['pros'] ?? []);
            $g->setCons($d['cons'] ?? []);
            $g->setLongDescription($d['longDescription'] ?? null);
            $g->setReviews($d['reviews'] ?? []);

            $manager->persist($g);
            $games[$slug] = $g;
        }

// =========================
// NEWS
// =========================
$newsData = [
    [
        'title' => 'Nouvelle saison Fortnite : tout ce qui change',
        'slug' => 'fortnite-saison-nouveautes',
        'excerpt' => 'Nouvelle map, nouvelles armes et équilibrage : voici le résumé des nouveautés.',
        'coverUrl' => '/assets/news/fortnite.jpg',
        'author' => 'GameZone',
        'tags' => ['Fortnite', 'Patch', 'Battle Royale'],
        'gameSlug' => 'fortnite',
        'createdAt' => '2026-01-07',
        'content' =>
            "Epic lance une nouvelle saison avec une refonte de la map.\n"
            . "Au programme : loot remanié, mobilité ajustée et nouveaux modes temporaires.\n"
            . "On te liste les meilleurs changements et ceux qui font débat.",
    ],
    [
        'title' => 'Rumeurs Forza Horizon 6 : premiers indices',
        'slug' => 'forza-horizon-6-rumeurs',
        'excerpt' => 'Un nouvel environnement et une fenêtre possible : on fait le point.',
        'coverUrl' => '/assets/news/forza.jpg',
        'author' => 'Yoann',
        'tags' => ['Forza', 'Rumeurs', 'Xbox'],
        'gameSlug' => 'forza-horizon-5',
        'createdAt' => '2026-01-07',
        'content' =>
            "Des indices repérés sur les réseaux laissent penser à un nouvel épisode.\n"
            . "Le studio pourrait viser une sortie en 2026.\n"
            . "Rien d’officiel, mais certains détails reviennent souvent.",
    ],

    // FUTURES NEWS
    [
        'title' => 'GTA VI : ce que l’on sait déjà sur le prochain Rockstar',
        'slug' => 'gta-vi-ce-que-l-on-sait',
        'excerpt' => 'Retour à Vice City, ambitions énormes et attentes record : on résume les infos fiables.',
        'coverUrl' => '/assets/news/gta6.jpg',
        'author' => 'GameZone',
        'tags' => ['GTA VI', 'Rockstar', 'Open World'],
        'gameSlug' => 'gta-v',
        'createdAt' => '2026-01-08',
        'content' =>
            "Rockstar prépare GTA VI avec un monde ouvert encore plus vivant.\n"
            . "Les infos les plus solides évoquent un retour à Vice City et une mise en scène plus ambitieuse.\n"
            . "En attendant des annonces officielles, on fait le tri entre rumeurs et éléments crédibles.",
    ],
    [
        'title' => 'Forza Horizon 6 : nouveau décor, nouvelles ambitions ?',
        'slug' => 'forza-horizon-6-nouveau-decor',
        'excerpt' => 'Playground Games pourrait déplacer Horizon vers un environnement totalement inédit.',
        'coverUrl' => '/assets/news/forza6.jpg',
        'author' => 'GameZone',
        'tags' => ['Forza Horizon 6', 'Rumeurs', 'Xbox'],
        'gameSlug' => 'forza-horizon-5',
        'createdAt' => '2026-01-08',
        'content' =>
            "Après le Mexique, les spéculations sur le prochain Horizon s’intensifient.\n"
            . "Nouveau continent, météo plus poussée et multijoueur amélioré : voici les pistes les plus sérieuses.\n"
            . "On te dit aussi ce qu’on aimerait vraiment voir évoluer.",
    ],
    [
        'title' => 'Horizon 3 : Aloy de retour pour une aventure encore plus ambitieuse',
        'slug' => 'horizon-3-aloy-retour',
        'excerpt' => 'La suite pourrait pousser l’exploration et les machines encore plus loin.',
        'coverUrl' => '/assets/news/horizon3.jpg',
        'author' => 'GameZone',
        'tags' => ['Horizon 3', 'Guerrilla', 'Action'],
        'gameSlug' => 'horizon-forbidden-west',
        'createdAt' => '2026-01-09',
        'content' =>
            "Après Forbidden West, une suite semble logique pour continuer l’arc narratif d’Aloy.\n"
            . "Nouvelles régions, machines encore plus impressionnantes et amélioration de la verticalité : voilà ce qu’on attend.\n"
            . "Pour l’instant, rien d’officialisé : on se base sur les tendances et les indices du studio.",
    ],
    [
        'title' => 'The Witcher 4 : nouvelle saga, nouveau départ',
        'slug' => 'the-witcher-4-nouvelle-saga',
        'excerpt' => 'CD Projekt Red prépare une nouvelle ère pour The Witcher, sans forcément Geralt.',
        'coverUrl' => '/assets/news/witcher4.jpg',
        'author' => 'GameZone',
        'tags' => ['The Witcher 4', 'CD Projekt', 'RPG'],
        'gameSlug' => 'the-witcher-3',
        'createdAt' => '2026-01-09',
        'content' =>
            "CD Projekt Red a confirmé travailler sur un nouveau chapitre dans l’univers The Witcher.\n"
            . "Changement de cycle, nouvelle direction et technologies modernes : les attentes sont énormes.\n"
            . "On récapitule ce qui est plausible et ce qui relève encore de la spéculation.",
    ],
];

foreach ($newsData as $nData) {
    $n = new News();
    $n->setTitle($nData['title']);
    $n->setSlug($nData['slug']);
    $n->setExcerpt($nData['excerpt']);
    $n->setCoverUrl($nData['coverUrl']);
    $n->setAuthor($nData['author']);
    $n->setTags($nData['tags']);
    $n->setContent($nData['content']);
    $n->setCreatedAt(new \DateTimeImmutable($nData['createdAt']));
    $n->setGame($games[$nData['gameSlug']] ?? null);

    $manager->persist($n);
}
        $manager->flush();
    }
}