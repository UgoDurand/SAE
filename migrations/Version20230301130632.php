<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301130632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE title_crew_name_basics (title_crew_id INT NOT NULL, name_basics_id INT NOT NULL, INDEX IDX_F827FF891D9E608F (title_crew_id), INDEX IDX_F827FF89384EA902 (name_basics_id), PRIMARY KEY(title_crew_id, name_basics_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE title_crew_name_basics ADD CONSTRAINT FK_F827FF891D9E608F FOREIGN KEY (title_crew_id) REFERENCES title_crew (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE title_crew_name_basics ADD CONSTRAINT FK_F827FF89384EA902 FOREIGN KEY (name_basics_id) REFERENCES name_basics (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE title_crew_name_basics');
    }
}
