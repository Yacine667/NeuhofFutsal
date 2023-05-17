<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517140109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entraineur CHANGE photo_entraineur photo_entraineur VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur ADD note_physique INT DEFAULT NULL, ADD note_vitesse INT DEFAULT NULL, DROP note_attaque, DROP note_gardien');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entraineur CHANGE photo_entraineur photo_entraineur VARCHAR(255) DEFAULT \'/img/Coach.png\'');
        $this->addSql('ALTER TABLE joueur ADD note_attaque INT DEFAULT NULL, ADD note_gardien INT DEFAULT NULL, DROP note_physique, DROP note_vitesse');
    }
}
