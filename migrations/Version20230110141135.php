<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230110141135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD group_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AD8D9C3C FOREIGN KEY (group_user_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649AD8D9C3C ON user (grou_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AD8D9C3C');
        $this->addSql('DROP INDEX IDX_8D93D649AD8D9C3C ON user');
        $this->addSql('ALTER TABLE user DROP group_user_id');
    }
}
