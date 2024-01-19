<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119132950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_tracks (artist_id INT NOT NULL, tracks_id INT NOT NULL, INDEX IDX_D66F2650B7970CF8 (artist_id), INDEX IDX_D66F26508FA7F33 (tracks_id), PRIMARY KEY(artist_id, tracks_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_tracks ADD CONSTRAINT FK_D66F2650B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_tracks ADD CONSTRAINT FK_D66F26508FA7F33 FOREIGN KEY (tracks_id) REFERENCES tracks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE albums ADD artist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE albums ADD CONSTRAINT FK_F4E2474FB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('CREATE INDEX IDX_F4E2474FB7970CF8 ON albums (artist_id)');
        $this->addSql('ALTER TABLE tracks ADD playlist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tracks ADD CONSTRAINT FK_246D2A2E6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('CREATE INDEX IDX_246D2A2E6BBD148 ON tracks (playlist_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist_tracks DROP FOREIGN KEY FK_D66F2650B7970CF8');
        $this->addSql('ALTER TABLE artist_tracks DROP FOREIGN KEY FK_D66F26508FA7F33');
        $this->addSql('DROP TABLE artist_tracks');
        $this->addSql('ALTER TABLE tracks DROP FOREIGN KEY FK_246D2A2E6BBD148');
        $this->addSql('DROP INDEX IDX_246D2A2E6BBD148 ON tracks');
        $this->addSql('ALTER TABLE tracks DROP playlist_id');
        $this->addSql('ALTER TABLE albums DROP FOREIGN KEY FK_F4E2474FB7970CF8');
        $this->addSql('DROP INDEX IDX_F4E2474FB7970CF8 ON albums');
        $this->addSql('ALTER TABLE albums DROP artist_id');
    }
}
