<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530231351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link ADD trigger VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE link ADD search_url VARCHAR(255) DEFAULT NULL');
        $this->addSql("ALTER TABLE links_folder ADD color VARCHAR(7) DEFAULT '#FF6633' NOT NULL;");
        $this->addSql("ALTER TABLE links_folder ADD icon VARCHAR(64) DEFAULT 'tabler:bookmarks' NOT NULL;");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE links_folder DROP color');
        $this->addSql('ALTER TABLE links_folder DROP icon');
        $this->addSql('ALTER TABLE link DROP trigger');
        $this->addSql('ALTER TABLE link DROP search_url');
    }
}
