<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301085953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE name_basics_title_basic (name_basics_id INT NOT NULL, title_basic_id INT NOT NULL, INDEX IDX_497A3514384EA902 (name_basics_id), INDEX IDX_497A35145AB1A4C3 (title_basic_id), PRIMARY KEY(name_basics_id, title_basic_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE name_basics_title_basic ADD CONSTRAINT FK_497A3514384EA902 FOREIGN KEY (name_basics_id) REFERENCES name_basics (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE name_basics_title_basic ADD CONSTRAINT FK_497A35145AB1A4C3 FOREIGN KEY (title_basic_id) REFERENCES title_basic (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE name_basics_title_basic');
    }
}
