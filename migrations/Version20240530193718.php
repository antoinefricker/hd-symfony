<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530193718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE links_folder_link (links_folder_id INT NOT NULL, link_id INT NOT NULL, PRIMARY KEY(links_folder_id, link_id))');
        $this->addSql('CREATE INDEX IDX_AAE57FD680BCC5BA ON links_folder_link (links_folder_id)');
        $this->addSql('CREATE INDEX IDX_AAE57FD6ADA40271 ON links_folder_link (link_id)');
        $this->addSql('ALTER TABLE links_folder_link ADD CONSTRAINT FK_AAE57FD680BCC5BA FOREIGN KEY (links_folder_id) REFERENCES links_folder (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE links_folder_link ADD CONSTRAINT FK_AAE57FD6ADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE links_folder_link DROP CONSTRAINT FK_AAE57FD680BCC5BA');
        $this->addSql('ALTER TABLE links_folder_link DROP CONSTRAINT FK_AAE57FD6ADA40271');
        $this->addSql('DROP TABLE links_folder_link');
    }
}
