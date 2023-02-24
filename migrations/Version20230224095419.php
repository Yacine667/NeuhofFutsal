<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224095419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, titre_actualite VARCHAR(255) NOT NULL, texte_actualite LONGTEXT NOT NULL, photo_actualite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avertir (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, avertissement_id INT DEFAULT NULL, motif_avertissement VARCHAR(255) NOT NULL, minute_avertissement INT NOT NULL, INDEX IDX_A4FEE6AB6CFC0818 (rencontre_id), INDEX IDX_A4FEE6ABA9E2D76C (joueur_id), INDEX IDX_A4FEE6AB246B5DFD (avertissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avertissement (id INT AUTO_INCREMENT NOT NULL, couleur_avertissement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE but (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, minute_but INT NOT NULL, INDEX IDX_B132FECA6CFC0818 (rencontre_id), INDEX IDX_B132FECAA9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entraineur (id INT AUTO_INCREMENT NOT NULL, nom_entraineur VARCHAR(255) NOT NULL, prenom_entraineur VARCHAR(255) NOT NULL, photo_entraineur VARCHAR(255) DEFAULT NULL, video_entraineur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, entraineur_id INT NOT NULL, nom_equipe VARCHAR(255) NOT NULL, logo_equipe VARCHAR(255) DEFAULT NULL, INDEX IDX_2449BA15F8478A1 (entraineur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, equipe_id INT NOT NULL, nom_joueur VARCHAR(255) NOT NULL, prenom_joueur VARCHAR(255) NOT NULL, numero_joueur INT NOT NULL, poste_joueur VARCHAR(255) NOT NULL, date_naissance_joueur DATETIME NOT NULL, photo_joueur VARCHAR(255) DEFAULT NULL, video_joueur VARCHAR(255) DEFAULT NULL, note_attaque INT DEFAULT NULL, note_defense INT DEFAULT NULL, note_passe INT DEFAULT NULL, note_drible INT DEFAULT NULL, note_gardien INT DEFAULT NULL, note_tir INT DEFAULT NULL, INDEX IDX_FD71A9C56D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oppose (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, equipe_1_id INT DEFAULT NULL, equipe_2_id INT DEFAULT NULL, INDEX IDX_A0CC6F806CFC0818 (rencontre_id), INDEX IDX_A0CC6F80F99ACD04 (equipe_1_id), INDEX IDX_A0CC6F80EB2F62EA (equipe_2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, texte_post LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remplacant (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, INDEX IDX_B7B007536CFC0818 (rencontre_id), INDEX IDX_B7B00753A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remplace_entrant (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, minute_remplacement INT NOT NULL, INDEX IDX_9B2026596CFC0818 (rencontre_id), INDEX IDX_9B202659A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remplace_sortant (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, motif_remplacement VARCHAR(255) NOT NULL, minute_remplacement INT NOT NULL, INDEX IDX_FE59F6746CFC0818 (rencontre_id), INDEX IDX_FE59F674A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rencontre (id INT AUTO_INCREMENT NOT NULL, stade_id INT NOT NULL, date_rencontre DATETIME NOT NULL, score_rencontre VARCHAR(255) DEFAULT NULL, INDEX IDX_460C35ED6538AB43 (stade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stade (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, nom_stade VARCHAR(255) NOT NULL, adresse_stade VARCHAR(255) NOT NULL, photo_stade VARCHAR(255) DEFAULT NULL, INDEX IDX_E951C0AAA73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titulaire (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, joueur_id INT DEFAULT NULL, INDEX IDX_7FA5218B6CFC0818 (rencontre_id), INDEX IDX_7FA5218BA9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avertir ADD CONSTRAINT FK_A4FEE6AB6CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE avertir ADD CONSTRAINT FK_A4FEE6ABA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE avertir ADD CONSTRAINT FK_A4FEE6AB246B5DFD FOREIGN KEY (avertissement_id) REFERENCES avertissement (id)');
        $this->addSql('ALTER TABLE but ADD CONSTRAINT FK_B132FECA6CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE but ADD CONSTRAINT FK_B132FECAA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15F8478A1 FOREIGN KEY (entraineur_id) REFERENCES entraineur (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE oppose ADD CONSTRAINT FK_A0CC6F806CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE oppose ADD CONSTRAINT FK_A0CC6F80F99ACD04 FOREIGN KEY (equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE oppose ADD CONSTRAINT FK_A0CC6F80EB2F62EA FOREIGN KEY (equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE remplacant ADD CONSTRAINT FK_B7B007536CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE remplacant ADD CONSTRAINT FK_B7B00753A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE remplace_entrant ADD CONSTRAINT FK_9B2026596CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE remplace_entrant ADD CONSTRAINT FK_9B202659A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE remplace_sortant ADD CONSTRAINT FK_FE59F6746CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE remplace_sortant ADD CONSTRAINT FK_FE59F674A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35ED6538AB43 FOREIGN KEY (stade_id) REFERENCES stade (id)');
        $this->addSql('ALTER TABLE stade ADD CONSTRAINT FK_E951C0AAA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE titulaire ADD CONSTRAINT FK_7FA5218B6CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE titulaire ADD CONSTRAINT FK_7FA5218BA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avertir DROP FOREIGN KEY FK_A4FEE6AB6CFC0818');
        $this->addSql('ALTER TABLE avertir DROP FOREIGN KEY FK_A4FEE6ABA9E2D76C');
        $this->addSql('ALTER TABLE avertir DROP FOREIGN KEY FK_A4FEE6AB246B5DFD');
        $this->addSql('ALTER TABLE but DROP FOREIGN KEY FK_B132FECA6CFC0818');
        $this->addSql('ALTER TABLE but DROP FOREIGN KEY FK_B132FECAA9E2D76C');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15F8478A1');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE oppose DROP FOREIGN KEY FK_A0CC6F806CFC0818');
        $this->addSql('ALTER TABLE oppose DROP FOREIGN KEY FK_A0CC6F80F99ACD04');
        $this->addSql('ALTER TABLE oppose DROP FOREIGN KEY FK_A0CC6F80EB2F62EA');
        $this->addSql('ALTER TABLE remplacant DROP FOREIGN KEY FK_B7B007536CFC0818');
        $this->addSql('ALTER TABLE remplacant DROP FOREIGN KEY FK_B7B00753A9E2D76C');
        $this->addSql('ALTER TABLE remplace_entrant DROP FOREIGN KEY FK_9B2026596CFC0818');
        $this->addSql('ALTER TABLE remplace_entrant DROP FOREIGN KEY FK_9B202659A9E2D76C');
        $this->addSql('ALTER TABLE remplace_sortant DROP FOREIGN KEY FK_FE59F6746CFC0818');
        $this->addSql('ALTER TABLE remplace_sortant DROP FOREIGN KEY FK_FE59F674A9E2D76C');
        $this->addSql('ALTER TABLE rencontre DROP FOREIGN KEY FK_460C35ED6538AB43');
        $this->addSql('ALTER TABLE stade DROP FOREIGN KEY FK_E951C0AAA73F0036');
        $this->addSql('ALTER TABLE titulaire DROP FOREIGN KEY FK_7FA5218B6CFC0818');
        $this->addSql('ALTER TABLE titulaire DROP FOREIGN KEY FK_7FA5218BA9E2D76C');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE avertir');
        $this->addSql('DROP TABLE avertissement');
        $this->addSql('DROP TABLE but');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE entraineur');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE oppose');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE remplacant');
        $this->addSql('DROP TABLE remplace_entrant');
        $this->addSql('DROP TABLE remplace_sortant');
        $this->addSql('DROP TABLE rencontre');
        $this->addSql('DROP TABLE stade');
        $this->addSql('DROP TABLE titulaire');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
