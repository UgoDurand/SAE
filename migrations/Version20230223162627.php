<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223162627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE name_basics');
        $this->addSql('DROP TABLE title_akas');
        $this->addSql('DROP TABLE title_basics');
        $this->addSql('DROP TABLE title_crew');
        $this->addSql('DROP TABLE title_episode');
        $this->addSql('DROP TABLE title_principals');
        $this->addSql('DROP TABLE title_ratings');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE name_basics (nconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, primaryName TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, birthYear INT DEFAULT NULL, deathYear INT DEFAULT NULL, primaryProfession TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, knownForTitles TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title_akas (tconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, ordering INT NOT NULL, title TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, region TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, language TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, types TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, attributes TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, isOriginalTitle TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title_basics (tconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, titleType TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, primaryTitle TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, originalTitle TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, isAdult TINYINT(1) DEFAULT NULL, startYear INT DEFAULT NULL, endYear INT DEFAULT NULL, runtimeMinutes INT DEFAULT NULL, genres TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title_crew (tconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, directors TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, writers TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title_episode (tconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, parentTconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, seasonNumber TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, episodeNumber TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title_principals (tconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, ordering INT NOT NULL, nconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, category TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, job TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, characters TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title_ratings (tconst TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, averageRating DOUBLE PRECISION DEFAULT NULL, numVotes INT DEFAULT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
