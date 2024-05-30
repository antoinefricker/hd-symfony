<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530200329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE links_folder_admin (links_folder_id INT NOT NULL, admin_id INT NOT NULL, PRIMARY KEY(links_folder_id, admin_id))');
        $this->addSql('CREATE INDEX IDX_2D98F1FB80BCC5BA ON links_folder_admin (links_folder_id)');
        $this->addSql('CREATE INDEX IDX_2D98F1FB642B8210 ON links_folder_admin (admin_id)');
        $this->addSql('ALTER TABLE links_folder_admin ADD CONSTRAINT FK_2D98F1FB80BCC5BA FOREIGN KEY (links_folder_id) REFERENCES links_folder (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE links_folder_admin ADD CONSTRAINT FK_2D98F1FB642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE links_folder_admin DROP CONSTRAINT FK_2D98F1FB80BCC5BA');
        $this->addSql('ALTER TABLE links_folder_admin DROP CONSTRAINT FK_2D98F1FB642B8210');
        $this->addSql('DROP TABLE links_folder_admin');
    }
}
