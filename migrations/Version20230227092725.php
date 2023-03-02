<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227092725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title_ratings ADD name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE title_ratings ADD CONSTRAINT FK_8CCA3EB071179CD6 FOREIGN KEY (name_id) REFERENCES title_basic (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8CCA3EB071179CD6 ON title_ratings (name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title_ratings DROP FOREIGN KEY FK_8CCA3EB071179CD6');
        $this->addSql('DROP INDEX UNIQ_8CCA3EB071179CD6 ON title_ratings');
        $this->addSql('ALTER TABLE title_ratings DROP name_id');
    }
}
