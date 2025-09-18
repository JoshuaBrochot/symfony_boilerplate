<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250918074829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sauce AS SELECT id, nom FROM sauce');
        $this->addSql('DROP TABLE sauce');
        $this->addSql('CREATE TABLE sauce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO sauce (id, name) SELECT id, nom FROM __temp__sauce');
        $this->addSql('DROP TABLE __temp__sauce');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sauce AS SELECT id, name FROM sauce');
        $this->addSql('DROP TABLE sauce');
        $this->addSql('CREATE TABLE sauce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO sauce (id, nom) SELECT id, name FROM __temp__sauce');
        $this->addSql('DROP TABLE __temp__sauce');
    }
}
