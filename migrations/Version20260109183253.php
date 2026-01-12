<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260109183253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game ADD long_description LONGTEXT DEFAULT NULL, ADD platforms JSON DEFAULT NULL, ADD rating DOUBLE PRECISION DEFAULT NULL, ADD rating_count INT DEFAULT NULL, ADD reviews JSON DEFAULT NULL, ADD pros JSON DEFAULT NULL, ADD cons JSON DEFAULT NULL, ADD publisher VARCHAR(150) DEFAULT NULL, ADD developer VARCHAR(150) DEFAULT NULL, ADD genre VARCHAR(100) DEFAULT NULL, ADD modes JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP long_description, DROP platforms, DROP rating, DROP rating_count, DROP reviews, DROP pros, DROP cons, DROP publisher, DROP developer, DROP genre, DROP modes');
    }
}
