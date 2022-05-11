<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511081937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message ADD email VARCHAR(255) NOT NULL, ADD subject LONGTEXT NOT NULL, DROP edit_at, CHANGE title username VARCHAR(255) NOT NULL, CHANGE body message LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message ADD title VARCHAR(255) NOT NULL, ADD body LONGTEXT NOT NULL, ADD edit_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP username, DROP message, DROP email, DROP subject');
    }
}
