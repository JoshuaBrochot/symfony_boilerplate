<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250918073233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, text VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE oignon (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE pain (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__burger AS SELECT id, name, price FROM burger');
        $this->addSql('DROP TABLE burger');
        $this->addSql('CREATE TABLE burger (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO burger (id, name, price) SELECT id, name, price FROM __temp__burger');
        $this->addSql('DROP TABLE __temp__burger');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE oignon');
        $this->addSql('DROP TABLE pain');
        $this->addSql('ALTER TABLE burger ADD COLUMN description VARCHAR(255) DEFAULT NULL');
    }
}
