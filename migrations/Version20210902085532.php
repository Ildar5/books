<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210902085532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, search VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_authors (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_1D2C02C7F675F31B (author_id), INDEX IDX_1D2C02C716A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, publish_year INT NOT NULL, isbn VARCHAR(50) NOT NULL, pages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book_authors ADD CONSTRAINT FK_1D2C02C7F675F31B FOREIGN KEY (author_id) REFERENCES authors (id)');
        $this->addSql('ALTER TABLE book_authors ADD CONSTRAINT FK_1D2C02C716A2B381 FOREIGN KEY (book_id) REFERENCES books (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book_authors DROP FOREIGN KEY FK_1D2C02C7F675F31B');
        $this->addSql('ALTER TABLE book_authors DROP FOREIGN KEY FK_1D2C02C716A2B381');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP TABLE book_authors');
        $this->addSql('DROP TABLE books');
    }
}
