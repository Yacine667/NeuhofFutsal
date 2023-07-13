<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705061937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oppose ADD score_match VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE rencontre DROP score_rencontre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oppose DROP score_match');
        $this->addSql('ALTER TABLE rencontre ADD score_rencontre VARCHAR(255) DEFAULT NULL');
    }
}
