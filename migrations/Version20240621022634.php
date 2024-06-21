<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240621022634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_rate (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, content_id INTEGER DEFAULT NULL, created_by_id INTEGER DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_128ED2FC84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_128ED2FCB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_128ED2FC84A0A3ED ON content_rate (content_id)');
        $this->addSql('CREATE INDEX IDX_128ED2FCB03A8386 ON content_rate (created_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_rate');
    }
}
