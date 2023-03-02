<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223153601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE title_basics (id INT AUTO_INCREMENT NOT NULL, tconst VARCHAR(255) NOT NULL, title_type VARCHAR(255) DEFAULT NULL, primary_title VARCHAR(255) DEFAULT NULL, original_title VARCHAR(255) DEFAULT NULL, is_adult TINYINT(1) DEFAULT NULL, start_year INT DEFAULT NULL, end_year INT DEFAULT NULL, runtime_minutes INT DEFAULT NULL, genres VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe CHANGE image image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE title_basics');
        $this->addSql('ALTER TABLE equipe CHANGE image image VARCHAR(255) DEFAULT NULL');
    }
}
