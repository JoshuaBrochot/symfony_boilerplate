<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250926073554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE burger (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pain_id INTEGER NOT NULL, image_id INTEGER NOT NULL, name VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, CONSTRAINT FK_EFE35A0D64775A84 FOREIGN KEY (pain_id) REFERENCES pain (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EFE35A0D3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_EFE35A0D64775A84 ON burger (pain_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EFE35A0D3DA5256D ON burger (image_id)');
        $this->addSql('CREATE INDEX IDX_A40C5A0417CE5090 ON burger_oignon (burger_id)');
        $this->addSql('CREATE INDEX IDX_A40C5A048F038184 ON burger_oignon (oignon_id)');
        $this->addSql('CREATE INDEX IDX_F889AB0F17CE5090 ON burger_sauce (burger_id)');
        $this->addSql('CREATE INDEX IDX_F889AB0F7AB984B7 ON burger_sauce (sauce_id)');
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, text VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, url VARCHAR(255) NOT NULL, alt_text VARCHAR(100) DEFAULT NULL)');
        $this->addSql('CREATE TABLE oignon (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE pain (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE sauce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE burger');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE oignon');
        $this->addSql('DROP TABLE pain');
        $this->addSql('DROP TABLE sauce');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
